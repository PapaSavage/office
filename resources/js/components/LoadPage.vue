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
                <h2>Инструкции по импорту:</h2>
                <div class="text-sm sm:text-base text-secondary flex flex-col gap-2">
                    <div>Шаг 1: Выберите файл Excel (.xlsx) с товарами.</div>
                    <div>Шаг 2: Нажмите кнопку "Загрузить файл".</div>
                    <div>Шаг 3: Подождите, пока файл будет обработан и данные будут импортированы в базу данных.</div>
                </div>
            </div>
            <div class="col-span-2 sm:col-span-1 flex flex-col items-center">
                <input type="file" @change="onFileChange" accept=".xlsx" class="w-2/3 mb-4 p-2 border rounded" />
                <button class="btn-primary-bigger" @click="uploadFile" :disabled="loading">
                    Загрузить товары
                </button>
            </div>
        </div>
    </div>
    <div v-if="loading" class="loading">
        <div>Загрузка товаров</div>
        <div class="loading-spinner "></div>
    </div>
</template>


<script setup>
import { ref } from 'vue';
import axios from 'axios';

const file = ref(null);
const loading = ref(false);

function onFileChange(event) {
    file.value = event.target.files[0];
}

function uploadFile() {
    if (!file.value) {
        alert('Please select a file first');
        return;
    }

    loading.value = true;

    let formData = new FormData();
    formData.append('file', file.value);

    axios.post('/api/import', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    })
        .then(response => {
            console.log(response);
            if (response.status === 200) {
                alert('File uploaded successfully!');
            }
        })
        .catch(error => {
            console.error('There was an error uploading the file!', error);
            console.log(response)
            alert('There was an error uploading the file!');
        })
        .finally(() => {
            loading.value = false;
        });
}
</script>