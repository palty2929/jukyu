<script setup>
import Main from '@/Layouts/Main.vue'
import Table from '@/Components/Table.vue'
import Paginate from '@/Components/Paginate.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    users: Object
})
</script>

<template>
    <Head title="ユーザー管理" />
    <Main>
        <template #title>ユーザー管理</template>
        <template #main>
            <div class="mt-8 bg-base-100">
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
                        <tr v-for="user in users.data" :key="user.id">
                            <td>{{ user.id }}</td>
                            <td>{{ user.roll }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.created_at }}</td>
                            <td>{{ user.updated_at }}</td>
                            <td>{{ user.deleted_at }}</td>
                            <td><Link :href="route('user.edit', user.id)" class="link no-underline">編集</Link></td>
                            <td>
                                <button
                                    type="button"
                                    @click="deleteEmit(user.uuid)"
                                    class="link no-underline text-error"
                                >
                                    削除
                                </button>
                            </td>
                        </tr>
                    </template>
                </Table>
                <Paginate :items="users" />
            </div>
        </template>
    </Main>
</template>
