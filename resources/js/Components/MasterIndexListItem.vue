<script setup>
import { Link } from '@inertiajs/inertia-vue3'

const props = defineProps({
    href: String,
    item: Object
})

const emit = defineEmits(['deleteEmit'])
const deleteEmit = (uuid) => emit('deleteEmit', uuid)
</script>

<template>
    <div class="flex justify-between items-center gap-4 border-b px-4 hover:bg-base-200">
        <Link :href="href" class="flex justify-between items-center grow py-3">
            <div class="grow flex justify-between items-center gap-8">
                <div class="flex items-center gap-6">
                    <slot />
                </div>
                <div class="flex items-center gap-4">
                    <span>{{ item.start_on }}</span>
                    <span class="text-sm">to</span>
                    <span>{{ item.end_on ?? '0000-00-00' }}</span>
                </div>
            </div>
        </Link>
        <div class="grow-0">
            <button type="button" @click="deleteEmit(item.uuid)" class="btn btn-link btn-sm text-error no-animation">
                削除
            </button>
        </div>
    </div>
</template>
