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
    <Head title="ユーザー管理" />
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">ユーザー管理</div>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <div class="flex flex-col">
                <table class="table table-zebra table-compact w-full">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>権限</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>作成日時</th>
                            <th>更新日時</th>
                            <th>削除日時</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.roll }}</td>
                            <td :class="{ 'line-through': user.deleted_at }">{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>{{ user.updated_at }}</td>
                            <td>{{ user.deleted_at }}</td>
                            <td>
                                <Link
                                    :href="route('user.edit', user.id)"
                                    class="flex justify-between items-center grow py-3"
                                    >編集</Link
                                >
                            </td>
                            <td>
                                <button
                                    type="button"
                                    @click="deleteEmit(item.uuid)"
                                    class="btn btn-link btn-sm text-error no-animation"
                                >
                                    削除
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </Layout>
</template>
