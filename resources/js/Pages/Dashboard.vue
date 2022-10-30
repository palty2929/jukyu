<script setup>
import MainColumn from '@/Layouts/MainColumn.vue'
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
    <Head title="ダッシュボード" />
    <MainColumn>
        <template #title>ダッシュボード</template>
        <template #action>
            <div class="flex gap-4">
                <input type="date" v-model="account_date" class="input input-outline" />
                <button type="button" @click="update" class="btn btn-primary no-animation">表示する</button>
            </div>
        </template>

        <template #main>
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>PPS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="supplier in suppliers" :key="supplier.id">
                        <td>{{ supplier.disp_name }}</td>
                    </tr>
                </tbody>
            </table>
        </template>
    </MainColumn>
</template>
