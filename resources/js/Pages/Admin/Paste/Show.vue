<script setup lang="ts">
    import AppLayout from "../../../Layouts/AppLayout.vue";

    const props = defineProps({
        paste: {
            type: Object,
        }
    })
</script>

<template>
    <AppLayout title="Pastes">
        <div>
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Paste Information</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Data submitted for your review.</p>
            </div>
            <div class="mt-6">
                <dl class="grid grid-cols-1 sm:grid-cols-2">
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email Address</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ paste.email_address }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-1 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Ticket Number</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ paste.ticket_number }}</dd>
                    </div>
                    <div class="border-t border-gray-100 px-4 py-6 sm:col-span-2 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Paste Content</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:mt-2">{{ paste.body }}</dd>
                    </div>
                </dl>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
