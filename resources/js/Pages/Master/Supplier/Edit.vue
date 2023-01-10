<script setup>
import Main from '@/Layouts/Main.vue'
import MasterCreate from '@/Layouts/MasterCreate.vue'
import ErrorMessage from '@/Components/ErrorMessage.vue'
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

function restoreItem() {
    Inertia.get(
        route('supplier.restore', props.supplier.uuid),
        {},
        {
            onBefore: () => confirm('このマスタを復元しますか？'),
            onSuccess: () => {
                toast.success('マスタを復元しました')
            }
        }
    )
}
</script>

<template>
    <Head title="PPSマスタの編集" />

    <Main>
        <template #title>PPSマスタの編集</template>
        <template #main>
            <form @submit.prevent="submit">
                <div v-if="supplier.deleted_at" class="alert alert-warning mb-8">
                    <div>
                        <i class="material-symbols-outlined">info</i>
                        <span>このマスタは削除されているため、編集するには削除を取り消す必要があります。</span>
                    </div>
                    <div class="flex-none">
                        <button type="button" @click="restoreItem" class="btn btn-sm btn-ghost">削除を取り消す</button>
                    </div>
                </div>
                <MasterCreate>
                    <template #contents>
                        <div class="flex flex-col gap-6">
                            <div>
                                <div class="m-1 font-bold">PPSコード</div>
                                <input
                                    type="text"
                                    v-model="form.pps_code"
                                    class="input input-bordered"
                                    placeholder="4061"
                                    required
                                    :readonly="supplier.deleted_at"
                                />
                                <ErrorMessage v-if="form.errors.pps_code" :message="form.errors.pps_code" />
                            </div>

                            <div>
                                <div class="m-1 font-bold">PPS正式名称</div>
                                <input
                                    type="text"
                                    v-model="form.name"
                                    class="input input-bordered w-full"
                                    placeholder="エナリスパワーマーケティング株式会社"
                                    required
                                    :readonly="supplier.deleted_at"
                                />
                                <ErrorMessage v-if="form.errors.name" :message="form.errors.name" />
                            </div>

                            <div>
                                <div class="m-1 font-bold">PPSシステム表示名</div>
                                <input
                                    type="text"
                                    v-model="form.disp_name"
                                    class="input input-bordered w-full"
                                    placeholder="EPM"
                                    required
                                    :readonly="supplier.deleted_at"
                                />
                                <ErrorMessage v-if="form.errors.disp_code" :message="form.errors.disp_code" />
                            </div>
                        </div>
                    </template>
                    <template #setting>
                        <div class="flex flex-col gap-6">
                            <div class="bg-base-200 px-6 py-4 rounded-lg">
                                <div class="text-lg font-bold mb-4 pb-4 border-b">マスタの公開</div>
                                <ul class="flex flex-col gap-4 mb-4">
                                    <li class="flex items-center gap-2">
                                        <i class="material-symbols-outlined opacity-80 w-6">public</i>
                                        <span>ステータス：</span>
                                        <span class="font-bold">公開済</span>
                                    </li>
                                    <li class="flex items-center gap-2">
                                        <i class="material-symbols-outlined opacity-80 w-6">visibility</i>
                                        <span>公開状態：</span>
                                        <span class="font-bold">公開</span>
                                    </li>
                                </ul>
                                <div v-if="!supplier.deleted_at" class="flex justify-between items-center gap-4">
                                    <button type="button" @click="deleteItem" class="text-error text-sm link font-bold">
                                        マスタを削除
                                    </button>
                                    <button
                                        type="submit"
                                        :disabled="!form.isDirty"
                                        class="btn btn-primary no-animation"
                                    >
                                        更新する
                                    </button>
                                </div>
                            </div>
                            <div class="bg-base-200 px-6 py-4 rounded-lg">
                                <div class="text-lg font-bold mb-4 pb-4 border-b">マスタの有効期限</div>
                                <div class="flex flex-col gap-6">
                                    <div>
                                        <div class="m-1 font-bold">開始</div>
                                        <input
                                            type="date"
                                            v-model="form.start_on"
                                            class="input input-bordered w-full"
                                            required
                                            :readonly="supplier.deleted_at"
                                        />
                                        <ErrorMessage v-if="form.errors.start_on" :message="form.errors.start_on" />
                                    </div>

                                    <div>
                                        <div class="m-1 font-bold">終了</div>
                                        <input
                                            type="date"
                                            v-model="form.end_on"
                                            class="input input-bordered w-full"
                                            :readonly="supplier.deleted_at"
                                        />
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
