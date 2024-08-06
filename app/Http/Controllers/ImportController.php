<?php

namespace App\Http\Controllers;

use App\Imports\GoodsImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;

class ImportController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);

        try {
            $goodsImport = new GoodsImport();
            Excel::import($goodsImport, $request->file('file'));
            return response()->json(['message' => 'Импорт успешен'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ошибка импорта', 'error' => $e->getMessage()], 500);
        }
    }
}
