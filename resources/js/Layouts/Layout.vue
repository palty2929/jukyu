<script setup>
import SidebarList from '@/Layouts/SidebarList.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div class="flex flex-col h-screen min-w-fit">
        <!-- header -->
        <div class="flex justify-between items-center bg-base-100 py-2 px-4">
            <div class="shrink-0 w-52">
                <h1 class="text-xl font-bold">{{ $page.props.app.name }}</h1>
            </div>
        </div>

        <!-- Container -->
        <div class="grow bg-base-100 border-t">
            <div class="flex h-full">
                <!-- Sidebar -->
                <div class="shrink-0 w-52 pr-4 border-r top-0 sticky">
                    <SidebarList />
                </div>
                <!-- Main -->
                <div class="grow bg-base-200">
                    <div class="p-6">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
