<script setup>
import MainColumn from '@/Layouts/MainColumn.vue'
import Table from '@/Components/Table.vue'
import Paginate from '@/Components/Paginate.vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    suppliers: Object
})

function deleteItem(uuid) {
    Inertia.delete(route('supplier.destroy', uuid), {
        onBefore: () => confirm('このマスタを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('マスタを削除しました')
        }
    })
}
</script>

<template>
    <Head title="PPSマスタ" />
    <MainColumn>
        <template #title>PPSマスタ</template>
        <template #action>
            <Link :href="route('supplier.create')" class="btn btn-primary no-animation">マスタの作成</Link>
        </template>

        <template #main>
            <template v-if="suppliers.data.length">
                <Table>
                    <template #header>
                        <th>PPSコード</th>
                        <th>正式名称</th>
                        <th>システム表示名</th>
                        <th>開始日</th>
                        <th>終了日</th>
                        <th>削除日時</th>
                        <th></th>
                    </template>
                    <template #body>
                        <tr v-for="supplier in suppliers.data" :key="supplier.id" class="hover">
                            <td>{{ supplier.pps_code }}</td>
                            <td>{{ supplier.name }}</td>
                            <td>{{ supplier.disp_name }}</td>
                            <td>{{ supplier.start_on }}</td>
                            <td>{{ supplier.end_on }}</td>
                            <td>{{ supplier.deleted_at }}</td>
                            <td>
                                <Link :href="route('supplier.edit', supplier.uuid)" class="link link-primary no-underline">編集</Link>
                            </td>
                        </tr>
                    </template>
                </Table>
                <Paginate :items="suppliers" />
            </template>
            <template v-else>
                <p>登録がありません</p>
            </template>
        </template>
    </MainColumn>
</template>
