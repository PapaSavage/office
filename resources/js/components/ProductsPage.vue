<template>
    <div class="flex flex-row items-center gap-4">

        <h2>Товары ({{ countgoods }})</h2>
        <a href="/load" class="btn-primary">Импорт</a>

    </div>
    <div class="goods_container mb-16">
        <ProductCard v-for="good in goods" :good="good" />
    </div>
</template>

<script setup>
import { ref } from "vue";
import ProductCard from './ProductCard/ProductCard.vue'

async function get_goods() {
    try {
        const response = await axios.get(`/api/goods`);
        goods.value = response.data.data;
        countgoods.value = goods.value.length;
    } catch (error) {
        console.error('Error fetching image URL:', error);
    }
}

const goods = ref([]);
const countgoods = ref(0);

get_goods();

</script>
