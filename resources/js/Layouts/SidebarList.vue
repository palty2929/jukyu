<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div v-if="$page.props.auth.user.roll < 10" class="my-4 border-b pb-4">
        <!-- <Link :href="route('dashboard')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/dashboard') }"
            >
                <i class="material-symbols-outlined">dashboard</i>
                <span class="text-sm w-full">ダッシュボード</span>
            </div>
        </Link> -->

        <Link :href="route('user.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/user') }"
            >
                <i class="material-symbols-outlined">account_circle</i>
                <span class="text-sm w-full">ユーザー管理</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 20" class="border-b pb-4 mb-4">
        <span class="text-xs px-4">マスタ権限 Roll:10～19</span>
        <Link :href="route('supplier.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/supplier') }"
            >
                <i class="material-symbols-outlined">corporate_fare</i>
                <span class="text-sm w-full">PPSマスタ</span>
            </div>
        </Link>

        <Link :href="route('area.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/area') }"
            >
                <i class="material-symbols-outlined">map</i>
                <span class="text-sm w-full">エリアマスタ</span>
            </div>
        </Link>

        <Link :href="route('bg.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/bg') }"
            >
                <i class="material-symbols-outlined">inbox</i>
                <span class="text-sm w-full">BGマスタ</span>
            </div>
        </Link>

        <Link :href="route('power.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/power') }"
            >
                <i class="material-symbols-outlined">power</i>
                <span class="text-sm w-full">電源マスタ</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 30" class="border-b pb-4 mb-4">
        <span class="text-xs px-4">ストック権限 Roll:20～29</span>
        <Link :href="route('stock.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/stock') }"
            >
                <i class="material-symbols-outlined">inventory</i>
                <span class="text-sm w-full">相対ストック</span>
            </div>
        </Link>

        <Link :href="route('generate.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/generate') }"
            >
                <i class="material-symbols-outlined">solar_power</i>
                <span class="text-sm w-full">発電ストック</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 40" class="border-b pb-4 mb-4">
        <span class="text-xs px-4">オペ権限 Roll:30～39</span>
        <Link :href="route('operation.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/operation') }"
            >
                <i class="material-symbols-outlined">dvr</i>
                <span class="text-sm w-full">オペレーション</span>
            </div>
        </Link>

        <Link :href="route('operation.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/bid') }"
            >
                <i class="material-symbols-outlined">gavel</i>
                <span class="text-sm w-full">入札 / 約定</span>
            </div>
        </Link>

        <Link :href="route('operation.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/occto') }"
            >
                <i class="material-symbols-outlined">fact_check</i>
                <span class="text-sm w-full">広域計画</span>
            </div>
        </Link>
    </div>

    <div class="border-b pb-4 mb-4">
        <span class="text-xs px-4">閲覧のみ権限 Roll:40～49</span>
        <Link :href="route('position.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/position') }"
            >
                <i class="material-symbols-outlined">bar_chart</i>
                <span class="text-sm w-full">ポジション一覧</span>
            </div>
        </Link>
    </div>

    <div class="pb-4 mb-4">
        <button type="button" @click="logout" class="flex items-center h-10 px-4 gap-4 hover:bg-base-300">
            <i class="material-symbols-outlined">logout</i>
            <span class="text-sm w-full">ログアウト</span>
        </button>
    </div>
</template>
