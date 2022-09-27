<script setup>
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div class="mt-4">
        <Link :href="route('dashboard')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/dashboard')
                }"
            >
                <i class="material-symbols-outlined">dashboard</i>
                <span class="text-sm w-full">ダッシュボード</span>
            </div>
        </Link>
    </div>

    <div class="border-t pt-4 mt-4">
        <Link :href="route('supplier.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/supplier')
                }"
            >
                <i class="material-symbols-outlined">corporate_fare</i>
                <span class="text-sm w-full">PPSマスタ</span>
            </div>
        </Link>

        <Link :href="route('area.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/area')
                }"
            >
                <i class="material-symbols-outlined">map</i>
                <span class="text-sm w-full">エリアマスタ</span>
            </div>
        </Link>

        <Link :href="route('bg.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/bg')
                }"
            >
                <i class="material-symbols-outlined">inbox</i>
                <span class="text-sm w-full">BGマスタ</span>
            </div>
        </Link>

        <Link :href="route('power.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/power')
                }"
            >
                <i class="material-symbols-outlined">power</i>
                <span class="text-sm w-full">電源マスタ</span>
            </div>
        </Link>
    </div>

    <div class="border-t pt-4 mt-4">
        <Link :href="route('stock.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/stock')
                }"
            >
                <i class="material-symbols-outlined">inventory</i>
                <span class="text-sm w-full">相対ストック</span>
            </div>
        </Link>

        <Link :href="route('generate.index')">
            <div
                class="flex items-center h-10 px-4 gap-4 hover:bg-base-300"
                :class="{
                    'bg-base-200': $page.url.startsWith('/generate')
                }"
            >
                <i class="material-symbols-outlined">solar_power</i>
                <span class="text-sm w-full">発電ストック</span>
            </div>
        </Link>
    </div>
</template>
