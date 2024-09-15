<script setup lang="ts">
    import PublicNavigation from "../Components/Navigations/PublicNavigation.vue";
    import {Head} from "@inertiajs/vue3";
    import Banner from "../Components/Banner.vue";

    const props = defineProps({
        title: {
            type: String,
            default: null,
        },
    })
</script>

<template>
    <div>
        <Head :title="props.title ? props.title : 'Home'" />

        <Banner />

        <div class="min-h-screen bg-gray-100">
            <PublicNavigation />

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto mt-2">
                <slot />
            </main>
        </div>
    </div>
</template>

<style scoped>

</style>
