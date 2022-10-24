<script setup>
import Layout from '@/Layouts/Layout.vue'
import { ref, onMounted } from 'vue'
import { Head, Link, useForm } from '@inertiajs/inertia-vue3'
import { useToast } from 'vue-toastification'
import { format, parseISO, addDays } from 'date-fns'
import Papa from 'papaparse'
const toast = useToast()

const props = defineProps({
    bg: Object,
    stocks: Object,
    month: String,
    startOfMonth: String
})

const form = useForm({
    month: props.month,
    bg_id: props.bg.id,
    segments: []
})

const submit = () => {
    form.post(route('stock.store', props.bg.uuid), {
        onSuccess: () => {
            toast.success('ストックデータを保存しました')
        }
    })
}

// ====================================================
// CSVインポート関連
// ====================================================
const file = ref()
const fileSelect = () => {
    file.value.click()
}

const drag = ref(false)
const onDropError = ref()
const importFile = ref()
const date = ref(parseISO(props.startOfMonth))

// ファイルがドロップされた場合
const onDrop = (event) => {
    drag.value = false

    // ゴミ箱などのアイコンがドロップされる可能性
    if (event.dataTransfer.files.length === 0) {
        onDropError.value = 'インポートできないオブジェクトです'
        return
    }

    // ファイル数チェック
    if (event.dataTransfer.files.length > 1) {
        onDropError.value = '複数のファイルが選択されています'
        return
    }
    importFile.value = event.dataTransfer.files[0]
    fileValidate()
}

// 直接ファイルが選択された場合はそのまま格納
const onChange = () => {
    importFile.value = file.value.files[0]
    fileValidate()
}

const fileValidate = () => {
    if (importFile.value.type !== 'text/csv') {
        onDropError.value = '選択されたファイルがCSV形式ではありません'
        return
    }
    filePreview()
}

function filePreview() {
    Papa.parse(importFile.value, {
        complete: function (result) {
            form.segments = result.data
        }
    })
}

const closeModal = () => {
    onDropError.value = ''
    importFile.value = ''
    form.segments = ''
}

const segments = [
    '00:00',
    '00:30',
    '01:00',
    '01:30',
    '02:00',
    '02:30',
    '03:00',
    '03:30',
    '04:00',
    '04:30',
    '05:00',
    '05:30',
    '06:00',
    '06:30',
    '07:00',
    '07:30',
    '08:00',
    '08:30',
    '09:00',
    '09:30',
    '10:00',
    '10:30',
    '11:00',
    '11:30',
    '12:00',
    '12:30',
    '13:00',
    '13:30',
    '14:00',
    '14:30',
    '15:00',
    '15:30',
    '16:00',
    '16:30',
    '17:00',
    '17:30',
    '18:00',
    '18:30',
    '19:00',
    '19:30',
    '20:00',
    '20:30',
    '21:00',
    '21:30',
    '22:00',
    '22:30',
    '23:00',
    '23:30'
]
</script>

<template>
    <Head>
        <title>ストック編集 {{ bg.supplier.disp_name }} {{ bg.bg_name }}</title>
    </Head>

    <Layout>
        <div class="flex justify-between items-start">
            <div class="text-3xl font-bold">
                <div class="flex gap-4">
                    <span>{{ bg.supplier.disp_name }}</span>
                    <span>{{ bg.dummy_name ?? bg.bg_name }}</span>
                    <span>{{ month }}</span>
                </div>
            </div>
            <a href="#modal" class="btn btn-primary modal-button no-animation">CSVインポート</a>
        </div>

        <div class="bg-base-100 px-8 py-6 mt-8">
            <template v-if="stocks.length">
                <div class="flex justify-between text-xs">
                    <div class="grow w-[1/32]">
                        <div class="h-6"></div>
                        <template v-for="(segment, index) in segments" :key="index">
                            <div>{{ segment }}</div>
                        </template>
                    </div>
                    <template v-for="stock in stocks" :key="stock.id">
                        <div class="grow w-[1/32]">
                            <!-- ちょっとあり得ない実装だけど時間がないので仕方ない -->
                            <div class="mb-2">{{ stock.date }}</div>
                            <div>{{ stock.segment_1.toLocaleString() }}</div>
                            <div>{{ stock.segment_2.toLocaleString() }}</div>
                            <div>{{ stock.segment_3.toLocaleString() }}</div>
                            <div>{{ stock.segment_4.toLocaleString() }}</div>
                            <div>{{ stock.segment_5.toLocaleString() }}</div>
                            <div>{{ stock.segment_6.toLocaleString() }}</div>
                            <div>{{ stock.segment_7.toLocaleString() }}</div>
                            <div>{{ stock.segment_8.toLocaleString() }}</div>
                            <div>{{ stock.segment_9.toLocaleString() }}</div>
                            <div>{{ stock.segment_10.toLocaleString() }}</div>
                            <div>{{ stock.segment_11.toLocaleString() }}</div>
                            <div>{{ stock.segment_12.toLocaleString() }}</div>
                            <div>{{ stock.segment_13.toLocaleString() }}</div>
                            <div>{{ stock.segment_14.toLocaleString() }}</div>
                            <div>{{ stock.segment_15.toLocaleString() }}</div>
                            <div>{{ stock.segment_16.toLocaleString() }}</div>
                            <div class="border-y">
                                <div>{{ stock.segment_17.toLocaleString() }}</div>
                                <div>{{ stock.segment_18.toLocaleString() }}</div>
                                <div>{{ stock.segment_19.toLocaleString() }}</div>
                                <div>{{ stock.segment_20.toLocaleString() }}</div>
                                <div>{{ stock.segment_21.toLocaleString() }}</div>
                                <div>{{ stock.segment_22.toLocaleString() }}</div>
                                <div>{{ stock.segment_23.toLocaleString() }}</div>
                                <div>{{ stock.segment_24.toLocaleString() }}</div>
                                <div>{{ stock.segment_25.toLocaleString() }}</div>
                                <div>{{ stock.segment_26.toLocaleString() }}</div>
                                <div>{{ stock.segment_27.toLocaleString() }}</div>
                                <div>{{ stock.segment_28.toLocaleString() }}</div>
                                <div>{{ stock.segment_29.toLocaleString() }}</div>
                                <div>{{ stock.segment_30.toLocaleString() }}</div>
                                <div>{{ stock.segment_31.toLocaleString() }}</div>
                                <div>{{ stock.segment_32.toLocaleString() }}</div>
                                <div>{{ stock.segment_33.toLocaleString() }}</div>
                                <div>{{ stock.segment_34.toLocaleString() }}</div>
                                <div>{{ stock.segment_35.toLocaleString() }}</div>
                                <div>{{ stock.segment_36.toLocaleString() }}</div>
                                <div>{{ stock.segment_37.toLocaleString() }}</div>
                                <div>{{ stock.segment_38.toLocaleString() }}</div>
                                <div>{{ stock.segment_39.toLocaleString() }}</div>
                                <div>{{ stock.segment_40.toLocaleString() }}</div>
                                <div>{{ stock.segment_41.toLocaleString() }}</div>
                                <div>{{ stock.segment_42.toLocaleString() }}</div>
                                <div>{{ stock.segment_43.toLocaleString() }}</div>
                                <div>{{ stock.segment_44.toLocaleString() }}</div>
                            </div>
                            <div>{{ stock.segment_45.toLocaleString() }}</div>
                            <div>{{ stock.segment_46.toLocaleString() }}</div>
                            <div>{{ stock.segment_47.toLocaleString() }}</div>
                            <div>{{ stock.segment_48.toLocaleString() }}</div>
                        </div>
                    </template>
                </div>
            </template>
            <p v-else>対象データなし</p>
        </div>

        <div id="modal" class="modal">
            <template v-if="!form.segments.length">
                <div class="modal-box w-11/12 max-w-3xl relative" for="">
                    <a href="#" class="absolute right-4 top-4 p-2 cursor-pointer tooltip tooltip-left" data-tip="閉じる"
                        ><i class="material-symbols-outlined align-middle"> close </i></a
                    >
                    <div class="text-lg font-bold">ストックデータCSVインポート</div>
                    <p class="my-4">縦に48コマ、横に日付でデータを揃えて取込みます。</p>

                    <!-- ファイルのドロップエリア -->
                    <div
                        class="bg-base-200 rounded-lg p-2 transition"
                        :class="{ 'bg-base-300': drag }"
                        @dragover.prevent="drag = true"
                        @dragleave.prevent="drag = false"
                        @drop.prevent="onDrop"
                    >
                        <div class="border-4 border-base-300 border-dashed rounded-lg p-8">
                            <div class="flex flex-col justify-center items-center text-center gap-8 h-56">
                                <div class="flex flex-col gap-2">
                                    <span>インポートするCSVファイルをドラッグ&amp;ドロップします</span>
                                    <span class="text-sm opacity-70">ファイルはひとつのみ</span>
                                </div>
                                <button
                                    type="button"
                                    @click="fileSelect"
                                    class="btn btn-primary btn-outline no-animation"
                                >
                                    ファイルを選択
                                </button>
                                <input type="file" @change="onChange" class="hidden" ref="file" accept="text/csv" />
                                <span class="text-error">{{ onDropError }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <template v-else>
                <!-- csvファイルが読み込まれたら表示 -->
                <div class="modal-box w-11/12 max-w-max relative" for="">
                    <a
                        href="#"
                        @click="closeModal"
                        class="absolute right-4 top-4 p-2 cursor-pointer tooltip tooltip-left"
                        data-tip="閉じる"
                        ><i class="material-symbols-outlined align-middle">close</i></a
                    >
                    <div class="text-lg font-bold">CSVプレビュー</div>
                    <p class="my-4">以下の内容で取込み、すでにデータが存在する場合は上書きします</p>
                    <div class="text-xs">
                        <div class="flex mb-1 pb-1 border-b">
                            <span class="w-20"></span>
                            <span v-for="n in 48" :key="n" class="w-9 opacity-50">{{ n }}</span>
                        </div>
                        <template v-for="(row, index) in form.segments" :key="index">
                            <div class="flex">
                                <span class="w-20">{{ format(addDays(date, index), 'yyyy/MM/dd') }}</span>
                                <span v-for="(segment, index) in row" :key="index" class="w-9">{{ segment }}</span>
                            </div>
                        </template>
                    </div>

                    <div class="modal-action">
                        <label @click="form.segments = []" class="btn btn-ghost no-animation">ファイル選択に戻る</label>
                        <button type="button" @click="submit" class="btn btn-primary no-animation">保存</button>
                    </div>
                </div>
            </template>
        </div>
    </Layout>
</template>
