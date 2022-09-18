<template>
    <Head title="Contact" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Contact
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        :href="route('contact.create')"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 text-white rounded-md"
                        >New Contact</Link
                    >
                </div>
                <!-- table -->
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                    <table
                        class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
                    >
                        <thead
                            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
                        >
                            <tr>
                                <th scope="col" class="py-3 px-6">ID</th>
                                <th scope="col" class="py-3 px-6">Name</th>
                                <th scope="col" class="py-3 px-6">Email</th>
                                <th scope="col" class="py-3 px-6">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="c in contact"
                                :key="c.id"
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
                            >
                                <td class="py-4 px-6">{{ c.id }}</td>
                                <td class="py-4 px-6">{{ c.name }}</td>
                                <td class="py-4 px-6">{{ c.email }}</td>

                                <td class="py-4 px-6 text-right">
                                    <Link
                                        :href="route('contact.edit', c.id)"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        >Edit
                                    </Link>
                                    <span>|</span>

                                    <Link
                                        :href="route('contact.destroy', c.id)"
                                        method="delete"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                    >
                                        Delete</Link
                                    >
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
    contact: Object,
});
</script>
<style></style>
