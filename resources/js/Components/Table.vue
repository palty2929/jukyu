<template>
    <table class="table-zebra table-compact table w-full">
        <thead>
            <tr>
                <slot name="header" />
            </tr>
        </thead>
        <tbody>
            <slot name="body" />
        </tbody>
    </table>
</template>
