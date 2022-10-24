<script setup>
import Layout from '@/Layouts/Layout.vue'
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'

const props = defineProps({
    account_date: String,
    suppliers: Object
})

const account_date = ref(props.account_date)
const update = () => {
    Inertia.get(
        route('dashboard'),
        { account_date: account_date.value },
        { only: ['suppliers'], preserveState: true, preserveScroll: true, replace: true }
    )
}
</script>

<template>
    <Head title="オペレーション" />

    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">オペレーション</div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-bold">受渡日</span>
                <input type="date" @change="update" v-model="account_date" class="input input-bordered" />
            </div>
        </div>

        <div class="flex flex-col gap-4 mt-12 bg-base-100 p-8">
            <div class="flex justify-end">
                <div class="flex gap-4">
                    <select class="select select-bordered">
                        <option disabled>アクションを選択</option>
                        <option>発電計画値を作成</option>
                        <option>入札ポジションを作成</option>
                        <option>約定ポジションを作成</option>
                    </select>
                    <button type="button" @click="exec" class="btn btn-primary no-animation">実行</button>
                </div>
            </div>

            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th><input type="checkbox" class="checkbox" /></th>
                        <th>コード</th>
                        <th>名称</th>
                        <th>ストック</th>
                        <th>FIT読込</th>
                        <th>発電計画</th>
                        <th>入札ポジ</th>
                        <th>約定ポジ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="supplier in suppliers" :key="supplier.id">
                        <td><input type="checkbox" class="checkbox" /></td>
                        <td>{{ supplier.pps_code }}</td>
                        <td>{{ supplier.disp_name }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </Layout>
</template>
