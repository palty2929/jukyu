<script setup>
import Sidebar from '@/Layouts/Sidebar.vue'
import { Link } from '@inertiajs/inertia-vue3'
</script>

<template>
    <div class="fixed top-0 w-60 bg-base-100 overflow-y-auto" data-theme="dark">
        <div class="px-4">
            <div class="flex min-h-screen flex-col justify-between">
                <div>
                    <div class="py-4 px-2">
                        <h1 class="text-3xl font-bold">{{ $page.props.app.name }}</h1>
                    </div>
                    <Sidebar />
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

    <div class="pl-60">
        <slot />
    </div>
</template>
