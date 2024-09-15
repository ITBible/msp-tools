<script setup lang="ts">
    import AppLayout from "../../../Layouts/AppLayout.vue";
    import {Link, router} from "@inertiajs/vue3";
    import {TrashIcon, EyeIcon} from "@heroicons/vue/24/solid";
    import {onMounted, onUnmounted} from "vue";

    const props = defineProps({
        pastes: {
            type: Object,
        }
    });

    let intervalId;

    onMounted(() => {
        intervalId = setInterval(() => {
            router.reload({ only: ['pastes'] })
        }, 10000);
    });

    onUnmounted(() => clearInterval(intervalId))
</script>

<template>
    <AppLayout title="Pastes">
        <div class="px-4 sm:px-0">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Pastes</h3>
            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">A list of items that were submitted to you.</p>
        </div>
        <table v-if="pastes.length > 0" class="min-w-full divide-y divide-gray-300">
            <thead>
            <tr>
                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Paste ID</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Email Address</th>
                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ticket Number</th>
                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                    <span class="sr-only">View or Delete</span>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            <tr v-for="paste in pastes" :key="paste.id">
                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ paste.id }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ paste.email_address }}</td>
                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ paste.ticket_number }}</td>
                <td class="whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0 grid grid-cols-2">
                    <Link :href="route('admin.pastes.show', [paste.id])">
                        <EyeIcon class="w-5 h-5" />
                        <span class="sr-only">View from, {{ paste.email_address }}</span>
                    </Link>
                    <Link :href="route('admin.pastes.destroy', paste.id)" method="delete" as="button" type="button">
                        <TrashIcon class="w-5 h-5"/>
                        <span class="sr-only">Delete from, {{ paste.email_address }}</span>
                    </Link>
<!--                    <Link :href="route('admin.pastes.destroy', [paste.id])">-->
<!--                        <TrashIcon class="w-5 h-5"/>-->
<!--                        <span class="sr-only">Delete from, {{ paste.email_address }}</span>-->
<!--                    </Link>-->
                </td>
            </tr>
            </tbody>
        </table>
        <div v-else class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-semibold text-gray-900">No Pastes</h3>
            <p class="mt-1 text-sm text-gray-500">There are currently no pastes for you to review.</p>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
