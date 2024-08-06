<template>
    <a class="card_good show-in">
        <swiper-container class="w-full" :slides-per-view="1" loop="true" pagination="true" scrollbar="true">
            <swiper-slide v-if="good.images[0]" v-for="image in good.images">
                <img class="w-full rounded-md" :src="image.path" alt="нету фото">
            </swiper-slide>
            <div v-else>
                <img class="w-full rounded-md" :src="gray_back" alt="">
            </div>
        </swiper-container>
        <div class="card_good__title">{{ good.name }}</div>
        <div class="flex flex-row justify-center sm:justify-between items-center">
            <div class="price">{{ good.price }}руб</div>
            <a :href="'/product/' + good.id" class="btn-primary hidden sm:block">Подробнее</a>
        </div>
        <a :href="'/product/' + good.id" class="btn-primary text-center block sm:hidden">Подробнее</a>
    </a>
</template>

<script setup>
import gray_back from '@/../img/gray_back.png';
import { defineProps } from 'vue';
import { register } from 'swiper/element/bundle';

import { ref } from 'vue';

const props = defineProps(['good'])

register();

const currentHost = window.location.host;

</script>
