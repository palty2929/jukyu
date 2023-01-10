<script setup>
const props = defineProps({
    message: Text
})
</script>

<template>
    <div class="text-error text-sm m-1">{{ message }}</div>
</template>
