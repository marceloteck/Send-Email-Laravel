<template>
    <AppHead title="Criar novo modelo de email" />
    <div>
        <MjmlEditor />
    </div>
</template>

<script setup>
const props = defineProps(["request"]);
console.log(props.request);
</script>
