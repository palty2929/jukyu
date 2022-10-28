<script setup>
import Layout from '@/Layouts/Layout.vue'
import MasterIndexListItem from '@/Components/MasterIndexListItem.vue'
import MasterIndexPagenation from '@/Components/MasterIndexPagenation.vue'
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
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">PPSマスタ</div>
            <Link :href="route('supplier.create')" class="btn btn-primary no-animation">マスタの作成</Link>
        </div>

        <div class="mt-12 bg-base-100">
            <template v-if="suppliers.data.length">
            <div class="border-b"></div>            
                <div class="flex flex-col">
                    <template v-for="supplier in suppliers.data" :key="supplier.id">
                        <MasterIndexListItem
                            @deleteEmit="deleteItem"
                            :href="route('supplier.edit', supplier.uuid)"
                            :item="supplier"
                        >
                            <div>{{ supplier.pps_code }}</div>
                            <div class="w-96 truncate">{{ supplier.name }}</div>
                            <div>{{ supplier.disp_name }}</div>
                        </MasterIndexListItem>
                    </template>
                </div>
                <MasterIndexPagenation :items="suppliers" />
            </template>
            <template v-else>
                <p>登録がありません</p>
            </template>
        </div>
    </Layout>
</template>
