<script setup>
    import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
    import { Head } from '@inertiajs/inertia-vue3';
    import Pagination from "@/Components/Pagination.vue";

    defineProps({
        posts: Object,
    });
</script>

<template>
    <Head title="Posts"></Head>

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <div class="p-6">
                        <ul v-for="post in posts.data">
                            <li class="bg-white border-b border-gray-200 rounded shadow-sm sm:rounded-lg p-4 mb-4">
                                <h2 class="font-semibold text-lg">{{ post.title }}</h2>

                                <div class="flex items-center text-gray-500">
                                    <span class="mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                    <span>{{ post.user.name }}, {{ post.created_at }}</span>
                                </div>

                                <p class="mt-6 pr-12">{{ post.body }}</p>
                            </li>
                        </ul>
                    </div>

                    <Pagination :links="posts.links" />
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>