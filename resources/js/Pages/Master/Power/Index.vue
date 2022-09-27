<script setup>
import Layout from '@/Layouts/Layout.vue'
import MasterIndexListItem from '@/Components/MasterIndexListItem.vue'
import MasterIndexPagenation from '@/Components/MasterIndexPagenation.vue'
import { computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    powers: Object
})

function deleteItem(uuid) {
    Inertia.delete(route('power.destroy', uuid), {
        onBefore: () => confirm('このマスタを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('マスタを削除しました')
        }
    })
}

const typeString = computed(() => (value) => {
    switch (value) {
        case 1:
            return 'FIT電源'
        case 2:
            return 'FIT送配'
        case 3:
            return '非調整'
    }
})
</script>

<template>
    <Head title="電源マスタ" />
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">電源マスタ</div>
            <Link :href="route('power.create')" class="btn btn-primary no-animation">マスタの作成</Link>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <div class="border-b"></div>
            <template v-if="powers.data.length">
                <div class="flex flex-col">
                    <template v-for="power in powers.data" :key="power.id">
                        <MasterIndexListItem
                            @deleteEmit="deleteItem"
                            :href="route('power.edit', power.uuid)"
                            :item="power"
                        >
                            <div class="w-16 truncate">{{ power.supplier.disp_name }}</div>
                            <div class="w-52 truncate">{{ power.bg.dummy_name ?? power.bg.bg_name }}</div>
                            <div class="w-16 truncate">{{ typeString(power.type) }}</div>
                            <div class="w-16 truncate">{{ power.power_code }}</div>
                            <div class="w-52 truncate">{{ power.power_name }}</div>
                            <div class="w-24 truncate">{{ power.contract_value.toLocaleString() }} kW</div>
                            <div class="w-24 truncate">{{ power.identity_number }}</div>
                        </MasterIndexListItem>
                    </template>
                </div>
                <MasterIndexPagenation :items="powers" />
            </template>
        </div>
    </Layout>
</template>
