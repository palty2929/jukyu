<script setup>
import Layout from '@/Layouts/Layout.vue'
</script>

<template>
    <Layout>
        <div class="py-4 px-8">
            <div class="flex items-start justify-between">
                <div class="text-3xl font-bold">
                    <slot name="title" />
                </div>
                <slot name="action" />
            </div>

            <div class="mt-8">
                <slot name="main" />
            </div>
        </div>
    </Layout>
</template>
