<script setup>
import Layout from '@/Layouts/Layout.vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    bg: Object,
    suppliers: Array
})

const form = useForm({
    start_on: props.bg.start_on,
    end_on: props.bg.end_on,
    supplier_id: props.bg.supplier_id,
    area_code: props.bg.area_code,
    bg_code: props.bg.bg_code,
    bg_name: props.bg.bg_name,
    dummy_code: props.bg.dummy_code,
    dummy_name: props.bg.dummy_name,
    is_sell: props.bg.is_sell,
    is_jbu: props.bg.is_jbu,
    is_power: props.bg.is_power
})

const submit = () => {
    form.put(route('bg.update', props.bg.uuid), {
        onSuccess: () => {
            toast.success('マスタを更新しました')
        }
    })
}

function deleteItem() {
    Inertia.delete(route('bg.destroy', props.bg.uuid), {
        onBefore: () => confirm('このマスタを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('マスタを削除しました')
        }
    })
}

const areas = {
    1: '北海道',
    2: '東北',
    3: '東京',
    4: '中部',
    5: '北陸',
    6: '関西',
    7: '中国',
    8: '四国',
    9: '九州',
    10: '沖縄'
}
</script>

<template>
    <Head title="BGマスタの編集" />

    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">BGマスタの編集</div>
        </div>

        <div class="bg-base-100 w-[800px] px-8 py-6 mt-8">
            <form @submit.prevent="submit">
                <div class="flex border-b mb-8 pb-8">
                    <div class="w-1/2">マスタの有効期限</div>
                    <div class="grow flex flex-col gap-6">
                        <div class="">
                            <div class="m-1 font-bold">開始</div>
                            <input type="date" v-model="form.start_on" class="input input-bordered w-56" required />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">終了</div>
                            <input type="date" v-model="form.end_on" class="input input-bordered w-56" />
                        </div>
                    </div>
                </div>

                <div class="flex">
                    <div class="w-1/2">マスタ設定</div>
                    <div class="grow flex flex-col gap-6">
                        <div class="">
                            <div class="m-1 font-bold">対象PPS</div>
                            <select v-model="form.supplier_id" class="select select-bordered w-full">
                                <template v-for="(supplier, index) in suppliers" :key="index">
                                    <option :value="supplier.value">
                                        {{ supplier.label }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">対象エリア</div>
                            <select v-model="form.area_code" class="select select-bordered w-full">
                                <template v-for="(area, key, index) in areas" :key="index">
                                    <option :value="key">
                                        {{ area }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">BGコード</div>
                            <input
                                type="text"
                                v-model="form.bg_code"
                                class="input input-bordered w-full"
                                placeholder="LA123"
                                required
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">BG名</div>
                            <input
                                type="text"
                                v-model="form.bg_name"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L"
                                required
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">ダミーBGコード</div>
                            <input
                                type="text"
                                v-model="form.dummy_code"
                                class="input input-bordered w-full"
                                placeholder="LA123-B"
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">ダミーBG名</div>
                            <input
                                type="text"
                                v-model="form.dummy_name"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" v-model="form.is_sell" id="is_spot" class="checkbox" />
                            <label for="is_spot" class="cursor-pointer">スポット売を許可</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" v-model="form.is_jbu" id="is_retail" class="checkbox" />
                            <label for="is_retail" class="cursor-pointer">JBU用BGとして登録</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" v-model="form.is_power" id="is_retail" class="checkbox" />
                            <label for="is_retail" class="cursor-pointer">発電BGとして登録</label>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between items-center border-t mt-8 pt-8">
                    <button type="button" @click="deleteItem" class="btn btn-error no-animation">マスタの削除</button>
                    <button type="submit" class="btn btn-primary no-animation" :disabled="!form.isDirty">
                        保存する
                    </button>
                </div>
            </form>
        </div>
    </Layout>
</template>
