<script setup>
import SidebarItem from '@/Components/SidebarItem.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div>
        <div class="fixed top-0 w-56 bg-base-100" data-theme="dark">
            <div class="px-2">
                <div class="flex min-h-screen flex-col justify-between">
                    <div>
                        <div class="py-4">
                            <h1 class="text-3xl font-bold">{{ $page.props.app.name }}</h1>
                        </div>

                        <div class="flex flex-col py-4">
                            <SidebarItem :url="route('user.index')" :path="$page.url.startsWith('/user')">
                                <i class="material-symbols-outlined">account_circle</i>
                                <span class="w-full text-sm">ユーザー管理</span>
                            </SidebarItem>
                        </div>

                        <div class="flex flex-col py-4">
                            <SidebarItem :url="route('supplier.index')" :path="$page.url.startsWith('/supplier')">
                                <i class="material-symbols-outlined">corporate_fare</i>
                                <span class="w-full text-sm">PPSマスタ</span>
                            </SidebarItem>

                            <SidebarItem :url="route('area.index')" :path="$page.url.startsWith('/area')">
                                <i class="material-symbols-outlined">map</i>
                                <span class="w-full text-sm">エリアマスタ</span>
                            </SidebarItem>

                            <SidebarItem :url="route('bg.index')" :path="$page.url.startsWith('/bg')">
                                <i class="material-symbols-outlined">inbox</i>
                                <span class="w-full text-sm">BGマスタ</span>
                            </SidebarItem>

                            <SidebarItem :url="route('power.index')" :path="$page.url.startsWith('/power')">
                                <i class="material-symbols-outlined">power</i>
                                <span class="w-full text-sm">電源マスタ</span>
                            </SidebarItem>
                        </div>

                        <div class="flex flex-col py-4">
                            <SidebarItem :url="route('stock.index')" :path="$page.url.startsWith('/stock')">
                                <i class="material-symbols-outlined">inventory</i>
                                <span class="w-full text-sm">相対ストック</span>
                            </SidebarItem>

                            <SidebarItem :url="route('generate.index')" :path="$page.url.startsWith('/generate')">
                                <i class="material-symbols-outlined">solar_power</i>
                                <span class="w-full text-sm">発電ストック</span>
                            </SidebarItem>
                        </div>

                        <div class="flex flex-col py-4">
                            <SidebarItem :url="route('operation.index')" :path="$page.url.startsWith('/operation')">
                                <i class="material-symbols-outlined">dvr</i>
                                <span class="w-full text-sm">オペレーション</span>
                            </SidebarItem>

                            <SidebarItem :url="route('user.index')" :path="$page.url.startsWith('/bid')">
                                <i class="material-symbols-outlined">gavel</i>
                                <span class="w-full text-sm">入札・約定</span>
                            </SidebarItem>

                            <SidebarItem :url="route('user.index')" :path="$page.url.startsWith('/occto')">
                                <i class="material-symbols-outlined">fact_check</i>
                                <span class="w-full text-sm">広域計画</span>
                            </SidebarItem>
                        </div>

                        <div class="flex flex-col py-4">
                            <SidebarItem :url="route('position.index')" :path="$page.url.startsWith('/position')">
                                <i class="material-symbols-outlined">bar_chart</i>
                                <span class="w-full text-sm">ポジション一覧</span>
                            </SidebarItem>
                        </div>
                    </div>

                    <div class="dropdown dropdown-top my-4">
                        <div tabindex="0" class="mt-1 cursor-pointer rounded-xl p-2 hover:bg-base-200">
                            <div class="flex items-center gap-3">
                                <img class="mask mask-squircle h-10 w-10" src="https://placeimg.com/160/160/arch" />
                                <div>
                                    <div class="text-sm font-bold">{{ $page.props.auth.user.name }}</div>
                                    <div class="text-xs break-all">{{ $page.props.auth.user.email }}</div>
                                </div>
                            </div>
                        </div>
                        <ul tabindex="0" class="dropdown-content menu rounded-box w-52 bg-base-200 p-2 shadow-lg">
                            <li><a>ログアウト</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="pl-56">
            <div class="my-4 mx-4">
                <slot />
            </div>
        </div>
    </div>
</template>
