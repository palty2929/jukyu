<script setup>
import Layout from '@/Layouts/Layout.vue'
import PositionChart from '@/Components/PositionChart.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({})
</script>

<template>
    <Head title="ポジション" />
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">ポジション</div>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <PositionChart />
        </div>
    </Layout>
</template>
