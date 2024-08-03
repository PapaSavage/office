<template>
    <a href="/" class="absolute top-4 left-4 btn-primary">Список товаров</a>

    <div class="h-screen flex flex-col justify-center">

        <div class="grid grid-cols-2 content-center items-center gap-10">
            <div class="col-span-2 sm:col-span-1">
                <h2>Импорт товаров</h2>
                <div class="text-sm text-secondary sm:text-base">
                    Загрузите файл с товарами: Введите описание о том, как пользователь может загрузить файл с товарами.
                    Например,
                    "Загрузите файл Excel (.xlsx) с товарами для импорта в базу данных."
                </div>
                <h2>
                    Инструкции по импорту:
                </h2>
                <div class="text-sm sm:text-base text-secondary flex flex-col gap-2">
                    <div>
                        Шаг 1: Выберите файл Excel (.xlsx) с товарами.
                    </div>
                    <div>Шаг 2: Нажмите кнопку "Загрузить файл".</div>
                    <div>
                        Шаг 3: Подождите, пока файл будет обработан и данные будут импортированы в базу данных.
                    </div>

                </div>
            </div>
            <button class="btn-primary-bigger col-span-2 sm:col-span-1">Загрузить товары</button>
        </div>
    </div>
</template>

<script setup></script>