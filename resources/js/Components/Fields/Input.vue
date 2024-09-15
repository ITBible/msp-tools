<script setup lang="ts">
    const props = defineProps(['modelValue']);
    const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <input type="text" :value="props.modelValue" @input="emit('update:modelValue', $event.target.value)" class="rounded-md border-0 py-1.5 px-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-900 sm:text-sm sm:leading-6" />
</template>

<style scoped>

</style>
