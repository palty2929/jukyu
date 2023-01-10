<template>
    <div class="flex gap-8">
        <div class="grow">
            <slot name="contents" />
        </div>
        <div class="w-1/4">
            <div class="sticky top-4">
                <slot name="setting" />
            </div>
        </div>
    </div>
</template>
