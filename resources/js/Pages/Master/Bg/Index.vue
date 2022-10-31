<script setup>
import MainColumn from '@/Layouts/MainColumn.vue'
import MasterIndexListItem from '@/Components/MasterIndexListItem.vue'
import Paginate from '@/Components/Paginate.vue'
import { computed } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    bgs: Object
})

function deleteItem(uuid) {
    Inertia.delete(route('bg.destroy', uuid), {
        onBefore: () => confirm('このマスタを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('マスタを削除しました')
        }
    })
}

const areaString = computed(() => (value) => {
    switch (value) {
        case 1:
            return '北海道'
        case 2:
            return '東北'
        case 3:
            return '東京'
        case 4:
            return '中部'
        case 5:
            return '北陸'
        case 6:
            return '関西'
        case 7:
            return '中国'
        case 8:
            return '四国'
        case 9:
            return '九州'
        case 10:
            return '沖縄'
    }
})
</script>

<template>
    <Head title="BGマスタ" />
    <MainColumn>
        <template #title>BGマスタ</template>
        <template #action>
            <Link :href="route('bg.create')" class="btn btn-primary no-animation">マスタの作成</Link>
        </template>

        <template #main>
            <template v-if="bgs.data.length">
                <div class="border-b"></div>
                <div class="flex flex-col">
                    <template v-for="bg in bgs.data" :key="bg.id">
                        <MasterIndexListItem @deleteEmit="deleteItem" :href="route('bg.edit', bg.uuid)" :item="bg">
                            <div class="w-16 truncate">{{ bg.supplier.disp_name }}</div>
                            <div class="w-16">{{ areaString(bg.area_code) }}</div>
                            <div class="w-16 truncate">{{ bg.bg_code }}</div>
                            <div class="w-52 truncate">{{ bg.bg_name }}</div>
                            <div class="w-16 truncate">{{ bg.dummy_code }}</div>
                            <div class="w-52 truncate">{{ bg.dummy_name }}</div>
                            <div class="w-44">スポット売：{{ bg.is_sell ? 'する' : 'しない' }}</div>
                            <div class="w-28">{{ bg.is_jbu ? 'JBU用BG' : bg.is_power ? '発電BG' : '相対BG' }}</div>
                        </MasterIndexListItem>
                    </template>
                </div>
                <Paginate :items="bgs" />
            </template>
            <template v-else>
                <p>登録がありません</p>
            </template>
        </template>
    </MainColumn>
</template>
