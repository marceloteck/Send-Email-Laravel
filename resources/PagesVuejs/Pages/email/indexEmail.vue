<template>
    <div>index</div>
    <br />
    <br />

    resposta: {{ props.resposta }}
    <br />
    <br />
    status: {{ props.status }}
</template>

<script setup>
const props = defineProps({ resposta: String, status: String });
</script>
