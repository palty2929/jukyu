<script setup>
import Layout from '@/Layouts/Layout.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    positions:Object
})
</script>

<template>
    <Head title="ポジション" />
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">ポジション</div>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <template v-if="positions.length">
                <div class="border-b"></div>
                <div class="flex flex-col">
                    <template v-for="position in positions" :key="position.id">
                        <div class="border-b hover:bg-base-300">
                            <Link
                                :href="route('position.show', position.uuid)"
                                class="flex items-center gap-4 py-2 px-4"
                            >
                                <div class="w-36">{{ bg.supplier.disp_name }}</div>
                                <div class="w-36">{{ bg.bg_code }}</div>
                                <div class="w-36">{{ bg.bg_name }}</div>
                                <div class="w-36">{{ bg.dummy_code ?? '-' }}</div>
                                <div class="w-36">{{ bg.dummy_name ?? '-' }}</div>
                            </Link>
                        </div>
                    </template>
                </div>
            </template>
            <p v-else>対象のBGがありません</p>
        </div>
    </Layout>
</template>
