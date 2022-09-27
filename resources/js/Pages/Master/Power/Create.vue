<script setup>
import Layout from '@/Layouts/Layout.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    suppliers: Array,
    bgs: Array
})

const form = useForm({
    start_on: '',
    end_on: '',
    supplier_id: '',
    bg_id: '',
    type: '',
    power_code: '',
    power_name: '',
    contract_value: '',
    identity_number: ''
})

const submit = () => {
    form.post(route('power.store'), {
        onSuccess: () => {
            toast.success('マスタを作成しました')
        }
    })
}

const types = {
    1: 'FIT電源',
    2: 'FIT送配',
    3: '非調整電源'
}

const getBgs = () => {
    Inertia.get(
        route('power.create'),
        { supplier_id: form.supplier_id },
        {
            only: ['bgs'],
            preserveState: true,
            preserveScroll: true,
            replace: true
        }
    )
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
                            <select @change="getBgs" v-model="form.supplier_id" class="select select-bordered w-full">
                                <template v-for="(supplier, index) in suppliers" :key="index">
                                    <option :value="supplier.value">
                                        {{ supplier.label }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">対象BG</div>
                            <select v-model="form.bg_id" class="select select-bordered w-full">
                                <template v-for="(bg, index) in bgs" :key="index">
                                    <option :value="bg.value">
                                        {{ bg.label }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">電源種別</div>
                            <select v-model="form.type" class="select select-bordered w-full">
                                <template v-for="(type, key, index) in types" :key="index">
                                    <option :value="key">
                                        {{ type }}
                                    </option>
                                </template>
                            </select>
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">系統コード</div>
                            <input
                                type="text"
                                v-model="form.power_code"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">発電所名</div>
                            <input
                                type="text"
                                v-model="form.power_name"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">契約電力</div>
                            <input
                                type="text"
                                v-model="form.contract_value"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">契約識別番号</div>
                            <input
                                type="text"
                                v-model="form.identity_number"
                                class="input input-bordered w-full"
                                placeholder="EPM_03_L_dummy"
                            />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end items-center border-t mt-8 pt-8">
                    <button type="submit" class="btn btn-primary no-animation">保存する</button>
                </div>
            </form>
        </div>
    </Layout>
</template>
