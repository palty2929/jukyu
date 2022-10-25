<script setup>
import Layout from '@/Layouts/Layout.vue'
import { ref, onMounted } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
const toast = useToast()

const props = defineProps({
    user: Object
})

const form = useForm({
    roll: props.user.roll,
    name: props.user.name,
    email: props.user.email
})

const submit = () => {
    form.put(route('user.update', props.user.id), {
        onSuccess: () => {
            toast.success('ユーザーを更新しました')
        }
    })
}

function deleteItem() {
    Inertia.delete(route('user.destroy', props.user.id), {
        onBefore: () => confirm('このユーザーを完全に削除しますか？'),
        onSuccess: () => {
            toast.success('ユーザーを削除しました')
        }
    })
}

function restoreItem() {
    Inertia.get(
        route('user.restore', props.user.id),
        {},
        {
            onBefore: () => confirm('このユーザーを復元しますか？'),
            onSuccess: () => {
                toast.success('ユーザーを復元しました')
            }
        }
    )
}
</script>

<template>
    <Head>
        <title>ユーザーの編集：{{ user.name }}</title>
    </Head>
    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">ユーザーの編集：{{ user.name }}</div>
        </div>

        <div class="mt-12 bg-base-100 p-8">
            <div v-if="user.deleted_at" class="alert alert-warning mb-8">
                <div>
                    <span class="material-symbols-outlined"> warning </span>
                    <span>このユーザーは削除されているため、ログインに使用できなくなっています。</span>
                </div>
                <div class="flex-none">
                    <button @click="restoreItem" class="btn btn-sm btn-ghost">復元する</button>
                </div>
            </div>

            <form @submit.prevent="submit">
                <div class="flex flex-col gap-4">
                    <div class="flex gap-2">
                        <div class="w-48">名前</div>
                        <div class="">
                            <input
                                type="text"
                                v-model="form.name"
                                class="input input-bordered input-sm"
                                :disabled="user.deleted_at"
                            />
                            <div class="text-error text-sm">{{ form.errors.name }}</div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-48">メールアドレス</div>
                        <div class="">
                            <input
                                type="email"
                                v-model="form.email"
                                class="input input-bordered input-sm"
                                :disabled="user.deleted_at"
                            />
                            <div class="text-error text-sm">{{ form.errors.email }}</div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-48">権限</div>
                        <div class="">
                            <input
                                type="tel"
                                v-model="form.roll"
                                class="input input-bordered input-sm"
                                :disabled="user.deleted_at"
                            />
                            <div class="text-error text-sm">{{ form.errors.roll }}</div>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-48">作成日時</div>
                        <div class="">{{ user.created_at }}</div>
                    </div>

                    <div class="flex gap-2">
                        <div class="w-48">削除日時</div>
                        <div class="">{{ user.deleted_at }}</div>
                    </div>
                </div>

                <div v-if="!user.deleted_at" class="flex justify-between items-center border-t mt-8 pt-8">
                    <button type="button" @click="deleteItem" class="btn btn-error no-animation">マスタの削除</button>
                    <button type="submit" class="btn btn-primary no-animation" :disabled="!form.isDirty">
                        保存する
                    </button>
                </div>
            </form>
        </div>
    </Layout>
</template>
