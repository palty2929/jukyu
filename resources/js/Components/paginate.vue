<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    items: Object
})
</script>

<template>
    <div class="flex justify-end items-center space-x-5 mt-2">
        <div v-if="items.total" class="text-xs">全 {{ items.total }} 件中 {{ items.from }}～{{ items.to }} 件目</div>
        <div class="flex">
            <Link
                :href="items.prev_page_url"
                class="btn btn-link text-base-content btn-xs hover:no-underline"
                replace
                preserve-scroll
            >
                <span class="material-symbols-outlined">chevron_left</span>
            </Link>
            <Link
                :href="items.next_page_url"
                class="btn btn-link text-base-content btn-xs hover:no-underline"
                replace
                preserve-scroll
            >
                <span class="material-symbols-outlined">chevron_right</span>
            </Link>
        </div>
    </div>
</template>
