<template>
    <a href="/" class="mt-6 btn-primary flex flex-row justify-center">Все товары</a>
    <div class="mt-10 grid grid-cols-2 gap-10 mb-10">
        <div>
            <swiper-container class="max-w-[600px]" grid-rows="1" :slides-per-view="1" loop="true" pagination="true"
                scrollbar="true">
                <swiper-slide v-if="good.images[0]" v-for="image in good.images">
                    <img class="w-full max-w-[600px] rounded-md" :src="image.path" alt="нету фото">
                </swiper-slide>
                <div v-else>
                    <img class="w-full max-w-[600px] rounded-md" :src="gray_back" alt="">
                </div>
            </swiper-container>
        </div>
        <div class="flex flex-col gap-4">
            <div class="font-bold text-2xl">{{ good.name }}</div>
            <div class="text-sm hidden sm:block text-secondary">{{ good.description }}</div>
            <div class="">
                <div class="font-bold text-md mb-4">О товаре</div>
                <div class="grid divide-y">
                    <div class="py-2 grid grid-cols-2 text-sm sm:text-base" v-for="extension in good.extensions">
                        <div class="text-secondary">{{ extension.key }}</div>
                        <div>{{ extension.value }}</div>
                    </div>
                </div>
            </div>
            <div class="border-t-2 price text-center pt-4">
                {{ good.price }}руб
            </div>
        </div>
        <div class="col-span-2 block sm:hidden">
            <div class="mb-4">Описание</div>
            <div class="text-sm text-secondary">{{ good.description }}</div>
        </div>
    </div>
</template>

<script setup>
import { register } from 'swiper/element/bundle';
import { ref } from 'vue';
import { useRoute } from 'vue-router';
import gray_back from '@/../img/gray_back.png';

async function get_good(id) {
    try {
        const response = await axios.get(`/api/goods/` + id);
        good.value = response.data.data;
        console.log(good.value);
    } catch (error) {
        console.error('Error fetching image URL:', error);
    }
}

register();
const route = useRoute();
const id = route.params.id;

const good = ref({
    name: '',
    description: '',
    price: 0,
    images: [],
    extensions: [],
});

get_good(id);


</script>
