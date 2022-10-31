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
    areas: Object
})

function deleteItem(uuid) {
    Inertia.delete(route('area.destroy', uuid), {
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
    <Head title="エリアマスタ" />
    <MainColumn>
        <template #title>エリアマスタ</template>
        <template #action>
            <Link :href="route('area.create')" class="btn btn-primary no-animation">マスタの作成</Link>
        </template>

        <template #main>
            <template v-if="areas.data.length">
            <div class="border-b"></div>
                <div class="flex flex-col">
                    <template v-for="area in areas.data" :key="area.id">
                        <MasterIndexListItem
                            @deleteEmit="deleteItem"
                            :href="route('area.edit', area.uuid)"
                            :item="area"
                        >
                            <div class="w-16 truncate">{{ area.supplier.disp_name }}</div>
                            <div class="w-16">{{ areaString(area.area_code) }}</div>
                            <div class="w-28">小売り：{{ area.is_retail ? 'する' : 'しない' }}</div>
                            <div class="w-40">スポット売買：{{ area.is_spot ? 'する' : 'しない' }}</div>
                            <div class="w-96 truncate">{{ area.gen_upload_code }}</div>
                        </MasterIndexListItem>
                    </template>
                </div>
            </template>
            <template v-else>
                <p>登録がありません</p>
            </template>
        </template>
    </MainColumn>
</template>
