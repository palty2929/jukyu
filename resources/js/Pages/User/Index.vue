<script setup>
import MainColumn from '@/Layouts/MainColumn.vue'
import Table from '@/Components/Table.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    users: Object
})
</script>

<template>
    <Head title="ユーザー管理" />
    <MainColumn>
        <template #title>ユーザー管理</template>
        <template #main>
            <div class="mt-8 bg-base-100">
                <div class="flex flex-col">
                    <Table>
                        <template #header>
                            <th>id</th>
                            <th>権限</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>作成日時</th>
                            <th>更新日時</th>
                            <th>削除日時</th>
                            <th></th>
                            <th></th>
                        </template>
                        <template #body>
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
                                        class="flex grow users-center justify-between py-3"
                                        >編集</Link
                                    >
                                </td>
                                <td>
                                    <button
                                        type="button"
                                        @click="deleteEmit(user.uuid)"
                                        class="btn btn-link btn-sm no-animation text-error"
                                    >
                                        削除
                                    </button>
                                </td>
                            </tr>
                        </template>
                    </Table>
                </div>
            </div>
        </template>
    </MainColumn>
</template>
