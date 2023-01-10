<script setup>
import Main from '@/Layouts/Main.vue'
import MasterCreate from '@/Layouts/MasterCreate.vue'
import ErrorMessage from '@/Components/ErrorMessage.vue'
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

    <Main>
        <template #title>PPSマスタの作成</template>
        <template #main>
            <form @submit.prevent="submit">
                <MasterCreate>
                    <template #contents>
                        <div class="flex flex-col gap-6">
                            <div>
                                <div class="m-1 font-bold">PPSコード<span class="badge badge-warning ml-2">必須</span></div>
                                <input
                                    type="text"
                                    v-model="form.pps_code"
                                    class="input input-bordered"
                                    placeholder="4061"
                                    required
                                />
                                <ErrorMessage v-if="form.errors.pps_code" :message="form.errors.pps_code" />
                            </div>

                            <div>
                                <div class="m-1 font-bold">PPS正式名称<span class="badge badge-warning ml-2">必須</span></div>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="input input-bordered w-full"
                                    placeholder="エナリスパワーマーケティング株式会社"
                                    required
                                />
                                <ErrorMessage v-if="form.errors.name" :message="form.errors.name" />
                            </div>

                            <div>
                                <div class="m-1 font-bold">PPSシステム表示名<span class="badge badge-warning ml-2">必須</span></div>
                                <input
                                    type="text"
                                    v-model="form.disp_name"
                                    class="input input-bordered w-full"
                                    placeholder="EPM"
                                    required
                                />
                                <ErrorMessage v-if="form.errors.disp_code" :message="form.errors.disp_code" />
                            </div>
                        </div>
                    </template>
                    <template #setting>
                        <div class="flex flex-col gap-6">
                            <div class="bg-base-200 px-6 py-4 rounded-lg">
                                <div class="text-lg font-bold mb-4 pb-4 border-b">マスタの公開</div>
                                <div class="flex justify-between items-center gap-4">
                                    <button type="button" class="text-sm link">下書きとして保存</button>
                                    <button type="submit" class="btn btn-primary no-animation">公開する</button>
                                </div>
                            </div>
                            <div class="bg-base-200 px-6 py-4 rounded-lg">
                                <div class="text-lg font-bold mb-4 pb-4 border-b">マスタの有効期限</div>
                                <div class="flex flex-col gap-6">
                                    <div>
                                        <div class="m-1 font-bold">開始日<span class="badge badge-warning ml-2">必須</span></div>
                                        <input
                                            type="date"
                                            v-model="form.start_on"
                                            class="input input-bordered w-full"
                                            required
                                        />
                                        <ErrorMessage v-if="form.errors.start_on" :message="form.errors.start_on" />
                                    </div>

                                    <div>
                                        <div class="m-1 font-bold">終了日</div>
                                        <input type="date" v-model="form.end_on" class="input input-bordered w-full" />
                                        <ErrorMessage v-if="form.errors.end_on" :message="form.errors.end_on" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </template>
                </MasterCreate>
            </form>
        </template>
    </Main>
</template>
