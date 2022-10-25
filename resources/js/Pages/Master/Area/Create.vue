<script setup>
import Layout from '@/Layouts/Layout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    suppliers: Array
})

const form = useForm({
    start_on: '',
    end_on: '',
    supplier_id: '',
    area_code: '',
    gen_upload_code: '',
    is_retail: true,
    is_spot: true
})

const submit = () => {
    form.post(route('area.store'), {
        onSuccess: () => {
            toast.success('マスタを作成しました')
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
    <Head title="エリアマスタの作成" />

    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">エリアマスタの作成</div>
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
                            <div class="m-1 font-bold">発電販売計画提出者コード</div>
                            <input
                                type="text"
                                v-model="form.gen_upload_code"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" v-model="form.is_retail" id="is_retail" class="checkbox" />
                            <label for="is_retail" class="cursor-pointer">小売りを許可</label>
                        </div>

                        <div class="flex items-center gap-4">
                            <input type="checkbox" v-model="form.is_spot" id="is_spot" class="checkbox" />
                            <label for="is_spot" class="cursor-pointer">スポット売買を許可</label>
                        </div>
                    </div>
                </div>
{{form.errors}}
                <div class="flex justify-end items-center border-t mt-8 pt-8">
                    <button type="submit" class="btn btn-primary no-animation">保存する</button>
                </div>
            </form>
        </div>
    </Layout>
</template>
