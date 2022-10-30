<script setup>
import SidebarSection from '@/Components/SidebarSection.vue'
import SidebarItem from '@/Components/SidebarItem.vue'
</script>

<template>
    <SidebarSection>
        <SidebarItem :url="route('user.index')" :path="$page.url.startsWith('/user')">
            <i class="material-symbols-outlined">account_circle</i>
            <span class="w-full text-sm">ユーザー管理</span>
        </SidebarItem>
    </SidebarSection>

    <SidebarSection>
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
    </SidebarSection>

    <SidebarSection>
        <SidebarItem :url="route('stock.index')" :path="$page.url.startsWith('/stock')">
            <i class="material-symbols-outlined">inventory</i>
            <span class="w-full text-sm">相対ストック</span>
        </SidebarItem>

        <SidebarItem :url="route('generate.index')" :path="$page.url.startsWith('/generate')">
            <i class="material-symbols-outlined">solar_power</i>
            <span class="w-full text-sm">発電ストック</span>
        </SidebarItem>
    </SidebarSection>

    <SidebarSection>
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
    </SidebarSection>

    <SidebarSection>
        <SidebarItem :url="route('position.index')" :path="$page.url.startsWith('/position')">
            <i class="material-symbols-outlined">bar_chart</i>
            <span class="w-full text-sm">ポジション一覧</span>
        </SidebarItem>
    </SidebarSection>
</template>
