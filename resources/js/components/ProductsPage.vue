<template>
    <div class="flex flex-row items-center gap-4">

        <h2>Товары ({{ countgoods }})</h2>
        <a href="/load" class="btn-primary">Импорт</a>

    </div>
    <div class="goods_container">
        <ProductCard v-for="good in goods" :good="good" />
    </div>
</template>

<script setup>
import { ref } from "vue";
import ProductCard from './ProductCard/ProductCard.vue'


const countgoods = ref(0);

const firstgood = {
    id: 1,
    name: 'Футболка',
    price: 1000,
    currency: '₽',
    img: 'jeans.jpg'
}

const goods = ref([])
goods.value[0] = firstgood;


</script>
