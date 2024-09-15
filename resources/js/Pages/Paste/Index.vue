<script setup lang="ts">
    import PublicLayout from "../../Layouts/PublicLayout.vue";
    import {useForm} from "@inertiajs/vue3";
    import TextArea from "../../Components/Fields/TextArea.vue";
    import Input from "../../Components/Fields/Input.vue";
    import Primary from "../../Components/Buttons/Primary.vue";
    import Secondary from "../../Components/Buttons/Secondary.vue";
    import {ExclamationCircleIcon} from "@heroicons/vue/24/solid/index.js";
    import {route} from "../../../../vendor/tightenco/ziggy";

    const submit = function() {
        form.post(route('paste.store'), {
            preserveScroll: true,
            onSuccess: () => clearAll(),
        })
    };

    const clearAll = function() {
        form.email_address = '';
        form.ticket_number = '';
        clear();
    }
    const clear = function() {
        form.body = '';
    }

    const form = useForm({
        email_address: '',
        ticket_number: '',
        body: '',
    });
</script>

<template>
    <PublicLayout title="Paste">
        <form @submit.prevent="submit">
            <div class="flex flex-col gap-2">
                <!-- form details -->
                <div class="grid grid-cols-1 md:grid-cols-2 md:px-2 gap-2">
                    <div>
                        <label for="email_address" class="block text-sm font-medium leading-6 text-gray-900">Email Address<span class="text-red-900">*</span>:</label>
                        <Input id="email_address" name="email_address" class="w-full" v-model="form.email_address" />
                        <span v-if="form.errors.email_address" class="text-red-900 text-xs">{{ form.errors.email_address }}</span>
                    </div>
                    <div>
                        <label for="ticket_number" class="block text-sm font-medium leading-6 text-gray-900">Ticket Number<span v-if="$page.props.config.paste_ticket_required" class="text-red-900">*</span>:</label>
                        <Input id="ticket_number" name="ticket_number" class="w-full" v-model="form.ticket_number" />
                        <span v-if="form.errors.ticket_number" class="text-red-900 text-xs">{{ form.errors.ticket_number }}</span>
                    </div>
                </div>
                <!-- ./form details -->
                <!-- form content -->
                <div class="h-64 md:px-2">
                    <label for="content" class="block text-sm font-medium leading-6 text-gray-900">Paste Content<span class="text-red-900">*</span>:</label>
                    <TextArea id="content" name="content" v-model="form.body" class="block w-full h-full resize-none" />
                    <span v-if="form.errors.body" class="text-red-900 text-xs">{{ form.errors.body }}</span>
                </div>
                <!-- ./form content -->
                <!-- buttons -->
                <div class="sm:col-span-6 flex flex-col items-center sm:flex-row sm:space-x-4 justify-end mt-6">
                    <div class="rounded-md bg-yellow-50 p-4 mb-2 w-full">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <ExclamationCircleIcon class="h-5 w-5 text-yellow-400" aria-hidden="true" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-yellow-800">The content of these pastes are stored with AES-265 bit encryption and only viewable by our staff.</p>
                            </div>
                        </div>
                    </div>
                    <div class="space-x-4 w-full sm:w-1/5 flex flex-1 justify-end mr-2">
                        <Secondary class="sm:h-2/3">Clear</Secondary>
                        <Primary type="submit" class="sm:h-2/3">Send</Primary>
                    </div>
                </div>
                <!-- ./buttons -->
            </div>
        </form>
    </PublicLayout>
</template>

<style scoped>

</style>
