<script setup>
import { ref } from 'vue'

const count = ref(0)
</script>

<template>
    <button class="" @click="count++">You clicked me {{ count }} times.</button>
</template>