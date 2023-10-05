<template>
    <AppHead title="Inicio" />
    <navbar :canLogin="props.canLogin" :canRegister="props.canRegister" />
    <div class="container text-center mt-5">
        <br />
        <mainIndex />
    </div>
</template>

<script setup>
const props = defineProps(["canLogin", "canRegister"]);
</script>

<!--
MENU PRINCIPAL
> HOME
> LOGIN
> CADASTRO

IMAGEM DE ENVIAR EMAIL
TEXT: PLATAFORMA DE ENVIO DE EMAILs PERSONALIZADOS

COR DE FUNDO AZUL LINKEDIN ESCURO, COM BRANCO

-->
