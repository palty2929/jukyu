<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    url: String,
    path: Boolean
})
</script>

<template>
    <Link :href="url">
        <div class="flex items-center gap-2 rounded-lg p-2 hover:bg-base-300" :class="{ 'bg-base-200': path }">
            <slot />
        </div>
    </Link>
</template>
