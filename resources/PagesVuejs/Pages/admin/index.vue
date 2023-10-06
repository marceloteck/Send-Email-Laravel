<template>
    <AppHead title="Administração do email" />
    <navbar :isLoggindStatus="props.isLoggindStatus" />
    <div>index admin</div>
</template>

<script setup>
const props = defineProps(["isLoggindStatus"]);
</script>
