<script setup>
import Layout from '@/Layouts/Layout.vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    supplier: Object
})

const form = useForm({
    start_on: props.supplier.start_on,
    end_on: props.supplier.end_on,
    pps_code: props.supplier.pps_code,
    name: props.supplier.name,
    disp_name: props.supplier.disp_name
})

const submit = () => {
    form.put(route('supplier.update', props.supplier.uuid), {
        onSuccess: () => {
            toast.success('マスタを更新しました')
        }
    })
}

function deleteItem() {
    Inertia.delete(route('supplier.destroy', props.supplier.uuid), {
        onBefore: () => confirm('このマスタを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('マスタを削除しました')
        }
    })
}
</script>

<template>
    <Head title="PPSマスタの編集" />

    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">PPSマスタの編集</div>
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
                            <div class="m-1 font-bold">PPSコード</div>
                            <input
                                type="text"
                                v-model="form.pps_code"
                                class="input input-bordered"
                                placeholder="4061"
                                required
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">PPS正式名称</div>
                            <input
                                type="text"
                                v-model="form.name"
                                class="input input-bordered w-full"
                                placeholder="エナリスパワーマーケティング株式会社"
                                required
                            />
                        </div>

                        <div class="">
                            <div class="m-1 font-bold">PPSシステム表示名</div>
                            <input
                                type="text"
                                v-model="form.disp_name"
                                class="input input-bordered w-full"
                                placeholder="EPM"
                                required
                            />
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
