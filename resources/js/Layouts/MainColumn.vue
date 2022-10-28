<script setup>
import Layout from '@/Layouts/Layout.vue'
</script>

<template>
    <Layout>        
        <div class="flex items-start justify-between">
            <div class="text-3xl font-bold">
                <slot name="title" />
            </div>
        </div>
        
        <slot name="main" />
    </Layout>
</template>