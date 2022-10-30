<script setup>
import MainColumn from '@/Layouts/MainColumn.vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const form = useForm({
    start_on: '',
    end_on: '',
    pps_code: '',
    name: '',
    disp_name: ''
})

const submit = () => {
    form.post(route('supplier.store'), {
        onSuccess: () => {
            toast.success('マスタを作成しました')
        }
    })
}
</script>

<template>
    <Head title="PPSマスタの作成" />

    <MainColumn>
        <template #title>PPSマスタの作成</template>

        <template #main>
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

                <div class="flex justify-end items-center border-t mt-8 pt-8">
                    <button type="submit" class="btn btn-primary no-animation">保存する</button>
                </div>
            </form>
        </template>
    </MainColumn>
</template>
