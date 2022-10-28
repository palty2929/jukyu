<script setup>
import { Link } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'

const logout = () => {
    Inertia.post(route('logout'))
}
</script>

<template>
    <div v-if="$page.props.auth.user.roll < 10" class="border-b pb-4">
        <Link :href="route('user.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/user') }"
            >
                <i class="material-symbols-outlined">account_circle</i>
                <span class="w-full text-sm">ユーザー管理</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 20" class="mb-4 border-b pb-4">
        <Link :href="route('supplier.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/supplier') }"
            >
                <i class="material-symbols-outlined">corporate_fare</i>
                <span class="w-full text-sm">PPSマスタ</span>
            </div>
        </Link>

        <Link :href="route('area.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/area') }"
            >
                <i class="material-symbols-outlined">map</i>
                <span class="w-full text-sm">エリアマスタ</span>
            </div>
        </Link>

        <Link :href="route('bg.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/bg') }"
            >
                <i class="material-symbols-outlined">inbox</i>
                <span class="w-full text-sm">BGマスタ</span>
            </div>
        </Link>

        <Link :href="route('power.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/power') }"
            >
                <i class="material-symbols-outlined">power</i>
                <span class="w-full text-sm">電源マスタ</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 30" class="mb-4 border-b pb-4">
        <Link :href="route('stock.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/stock') }"
            >
                <i class="material-symbols-outlined">inventory</i>
                <span class="w-full text-sm">相対ストック</span>
            </div>
        </Link>

        <Link :href="route('generate.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/generate') }"
            >
                <i class="material-symbols-outlined">solar_power</i>
                <span class="w-full text-sm">発電ストック</span>
            </div>
        </Link>
    </div>

    <div v-if="$page.props.auth.user.roll < 40" class="mb-4 border-b pb-4">
        <Link :href="route('operation.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/operation') }"
            >
                <i class="material-symbols-outlined">dvr</i>
                <span class="w-full text-sm">オペレーション</span>
            </div>
        </Link>

        <Link :href="route('operation.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/bid') }"
            >
                <i class="material-symbols-outlined">gavel</i>
                <span class="w-full text-sm">入札 / 約定</span>
            </div>
        </Link>

        <Link :href="route('operation.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/occto') }"
            >
                <i class="material-symbols-outlined">fact_check</i>
                <span class="w-full text-sm">広域計画</span>
            </div>
        </Link>
    </div>

    <div class="mb-4 border-b pb-4">
        <Link :href="route('position.index')">
            <div
                class="flex h-10 items-center gap-4 px-4 hover:bg-base-300"
                :class="{ 'bg-base-200': $page.url.startsWith('/position') }"
            >
                <i class="material-symbols-outlined">bar_chart</i>
                <span class="w-full text-sm">ポジション一覧</span>
            </div>
        </Link>
    </div>

    <div class="mb-4 pb-4">
        <button type="button" @click="logout" class="flex h-10 items-center gap-4 px-4 hover:bg-base-300">
            <i class="material-symbols-outlined">logout</i>
            <span class="w-full text-sm">ログアウト</span>
        </button>
    </div>
</template>
