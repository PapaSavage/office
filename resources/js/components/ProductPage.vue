<template>
    <a href="/" class="mt-6 btn-primary flex flex-row justify-center">Все товары</a>
    <div class="mt-10 grid grid-cols-2 gap-10">
        <div>
            <swiper-container class="max-w-[600px]" grid-rows="1" :slides-per-view="1" loop="true" pagination="true"
                scrollbar="true">
                <swiper-slide>
                    <img class="w-full max-w-[600px] rounded-md" :src="jeansImage" alt="Jeans">
                </swiper-slide>
                <swiper-slide>
                    <img class="w-full max-w-[600px] rounded-md" :src="whiteImage" alt="Jeans">
                </swiper-slide>
            </swiper-container>
        </div>
        <div class="flex flex-col gap-4">
            <div class="font-bold text-2xl">{{ firstgood.name }}</div>
            <div class="text-sm hidden sm:block text-secondary">{{ firstgood.description }}</div>
            <div class="">
                <div class="font-bold text-md mb-4">О товаре</div>
                <div class="grid divide-y">
                    <div class="py-2 grid grid-cols-2 text-sm sm:text-base" v-for="(value, key) in firstgood.otherprops"
                        :key="key">
                        <div class="text-secondary">{{ key }}</div>
                        <div>{{ value }}</div>
                    </div>
                </div>
            </div>
            <div class="border-t-2 price text-center pt-4">
                {{ firstgood.price }}{{ firstgood.currency }}
            </div>
        </div>
        <div class="col-span-2 block sm:hidden">
            <div class="mb-4">Описание</div>
            <div class="text-sm text-secondary">{{ firstgood.description }}</div>
        </div>
    </div>
</template>

<script setup>
import { register } from 'swiper/element/bundle';
import jeansImage from '@/../img/jeans.jpg';
import whiteImage from '@/../img/jeans_white.jpg';
import { ref } from 'vue';
import { useRoute } from 'vue-router';

register();
const route = useRoute();
const id = ref(route.params.id);

const firstgood = {
    name: 'Футболка',
    price: 1000,
    description: 'Трендовый и функциональный аксессуар для защиты бедер от натирания и появления раздражения в жаркую погоду. Изготовлены из микрофибры класса люкс, которая обладает высокой воздухопроницаемостью, и отличается гладкой, шелковистой текстурой.BRACCIALETTI превосходно облегают благодаря силиконовой основе, защищают кожу от трения при ходьбе и отлично сочетаются с платьями и юбками из легких и тонких материалов. Идеальная альтернатива брюкам и колготкам в жару.   Производство КИТАЙ',
    currency: '₽',
    img: 'jeans.jpg',
    otherprops: {
        "Цвет": 'Белый',
        "Размер": 'L'
    }
}
</script>
