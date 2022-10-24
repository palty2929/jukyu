<script setup>
import Layout from '@/Layouts/Layout.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    users: Object
})
</script>

<template>
    <Head title="ポジション" />
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">ポジション</div>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <template v-if="users">
                <div class="border-b"></div>
                <div class="flex flex-col">
                    <template v-for="user in users" :key="user.id">
                        <div class="flex justify-between items-center gap-4 border-b px-4 hover:bg-base-200">
                            <Link
                                :href="route('user.show', user.id)"
                                class="flex justify-between items-center grow py-3"
                            >
                                <div class="grow flex justify-between items-center gap-8">
                                    <div class="flex items-center gap-6">
                                        <div class="">{{ user.id }}</div>
                                        <div class="">{{ user.roll }}</div>
                                        <div class="">{{ user.name }}</div>
                                        <div class="">{{ user.email }}</div>
                                        <div class="">{{ user.created_at }}</div>
                                        <div class="">{{ user.deleted_at }}</div>
                                    </div>
                                </div>
                            </Link>
                            <div class="grow-0">
                                <button
                                    type="button"
                                    @click="deleteEmit(item.uuid)"
                                    class="btn btn-link btn-sm text-error no-animation"
                                >
                                    削除
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </template>
            <p v-else>ユーザーの登録がありません</p>
        </div>
    </Layout>
</template>
