<script setup>
    import { Link } from '@inertiajs/inertia-vue3';

    defineProps({
        links: Array
    });
</script>

<template>
    <div v-if="links.length > 3" class="flex justify-center">
        <template v-for="(link, key) in links">
            <div v-if="link.url === null"
                :key="key"
                class="px-4 py-3 mb-1 mr-1 text-sm leading-4 text-gray-400 border rounded"
                v-html="link.label"
            />

            <Link v-else
                class="
                        px-4
                        py-3
                        mb-1
                        mr-1
                        text-sm
                        leading-4
                        border
                        rounded
                        hover:bg-white
                        focus:border-indigo-500 focus:text-indigo-500
                    "
                    :class="{ 'bg-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
            />
        </template>
    </div>
</template>