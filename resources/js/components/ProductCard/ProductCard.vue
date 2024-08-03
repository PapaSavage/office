<template>
    <a class="card_good">
        <swiper-container class="w-full" :slides-per-view="1" loop="true" pagination="true" scrollbar="true">
            <swiper-slide>
                <img class="w-full rounded-md" :src="jeansImage" alt="Jeans">
            </swiper-slide>
            <swiper-slide>
                <img class="w-full rounded-md" :src="whiteImage" alt="Jeans">
            </swiper-slide>
        </swiper-container>
        <div class="card_good__title">{{ good.name }}</div>
        <div class="flex flex-row justify-center sm:justify-between items-center">
            <div class="price">{{ good.price }}{{ good.currency }}</div>
            <a :href="'/product/' + good.id" class="btn-primary hidden sm:block">Подробнее</a>
        </div>
        <a :href="'/product/' + good.id" class="btn-primary text-center block sm:hidden">Подробнее</a>
    </a>
</template>

<script setup>
import jeansImage from '@/../img/jeans.jpg';
import whiteImage from '@/../img/jeans_white.jpg';
import { defineProps } from 'vue';
import { register } from 'swiper/element/bundle';

defineProps(['good'])

register();

</script>
