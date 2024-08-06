<?php

namespace App\Imports;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


use App\Models\Good;
use App\Models\GoodExtension;
use App\Models\GoodImage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


HeadingRowFormatter::default('none');

class GoodsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    protected $headings;

    public function __construct()
    {
        $this->headings = [];
    }

    public function model(array $row)
    {
        if (empty($this->headings)) {
            $this->headings = array_keys($row);
        }

        $good = Good::updateOrCreate(
            ['external_code' => $row['Внешний код']],
            [
                'name' => $row['Наименование'],
                'description' => $row['Описание'],
                'price' => floatval($row['Цена: Цена продажи']),
            ]
        );

        $additional_headings = [
            "Доп. поле: Размер", "Доп. поле: Цвет", "Доп. поле: Бренд",
            "Доп. поле: Состав", "Доп. поле: Кол-во в упаковке", "Доп. поле: Вес товара(г)",
            "Доп. поле: Ширина(мм)", "Доп. поле: Высота(мм)", "Доп. поле: Длина(мм)",
            "Доп. поле: Вес упаковки(г)", "Доп. поле: Ширина упаковки(мм)", "Доп. поле: Высота упаковки(мм)",
            "Доп. поле: Длина упаковки(мм)", "Доп. поле: Категория товара"
        ];

        foreach ($additional_headings as $heading) {
            if (!empty($row[$heading])) {
                GoodExtension::firstOrCreate(
                    [
                        'good_id' => $good->id,
                        'key' => str_replace(
                            'Доп. поле: ',
                            '',
                            $heading
                        ),
                        'value' => strval($row[$heading]),
                    ]
                );
            }
        }

        $imageUrls = explode(',', $row['Доп. поле: Ссылки на фото']);


        foreach ($imageUrls as $imageUrl) {
            $imagePath = $this->downloadImage(trim($imageUrl));
            if ($imagePath) {
                GoodImage::firstOrCreate(
                    [
                        'good_id' => $good->id,
                        'url' => $imageUrl,
                        'path' => $imagePath,
                    ]
                );
            } else {
                Log::warning('Не удалось скачать изображение: ' . $imageUrl);
            }
        }

        return $good;
    }

    public function getHeadings()
    {
        return $this->headings;
    }

    private function downloadImage($url)
    {
        try {
            $headers = get_headers($url);
            if (strpos($headers[0], '200') === false) {
                throw new \Exception('URL не доступен: ' . $url);
            }

            $imageContents = file_get_contents($url);
            if ($imageContents === false) {
                throw new \Exception('Не удалось скачать изображение: ' . $url);
            }

            $imageName = basename(parse_url($url, PHP_URL_PATH));
            $imagePath = 'public/images/' . $imageName;

            if (!Storage::put($imagePath, $imageContents)) {
                throw new \Exception('Не удалось сохранить изображение: ' . $imagePath);
            }
            return $imagePath;
        } catch (\Exception $e) {
            Log::error('Ошибка при загрузке изображения: ' . $e->getMessage());
            return null; // Возвращаем null в случае ошибки
        }
    }
}
