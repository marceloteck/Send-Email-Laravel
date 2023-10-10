<template>
    <AppHead title="Administração do email" />
    <LayoutEmailAdmin>
        <template v-slot:topAbout>
            <div class="row send">
                <div class="col-11">
                    <input
                        type="text"
                        placeholder="Suporta varios e-mail separados por virgula"
                        class="inputEmail"
                    />
                </div>
                <div class="col-1">
                    <button type="button" class="btn btn-success">
                        Enviar
                    </button>
                </div>
            </div>
        </template>
        <template v-slot:barraMenu2>
            <div class="info">
                <input
                    type="text"
                    placeholder="Escreva um assunto"
                    class="inputAssunto"
                />
            </div>
        </template>
        <template v-slot:bodyContent>
            <div class="contentEmail">
                <button type="button" class="btn btnSendEmail">
                    Escolher modelo
                </button>
            </div>
        </template>
    </LayoutEmailAdmin>
</template>

<script setup>
const props = defineProps(["isLoggindStatus"]);
</script>

<style lang="scss" scoped>
.send {
    width: 100%;
    position: relative;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: baseline;
    justify-content: space-between;
    .inputEmail {
        width: 100%;
        margin-bottom: 15px;
        padding: 9px;
        border-radius: 4px;
        border: 0.8px solid #ece9e9;
        display: flex;
    }
    .inputEmail:focus,
    .inputEmail:active {
        outline: none !important;
    }
    .btn {
        width: 100%;
    }
}
.info {
    width: 100%;
    display: flex;

    .inputAssunto {
        position: relative;
        width: 100%;
        padding: 15px;
        border: 0.8px solid transparent;
        background: transparent;
        margin-top: 2px;
        font-size: 1.3em;
        color: #3c3939;
    }
    .inputAssunto:focus,
    .inputAssunto:focus-visible {
        outline: none;
        box-shadow: none;
        border-color: transparent;
        color: #000;
    }
}
.contentEmail {
    width: 100%;
    height: 100%;
    display: flex;
    align-content: center;
    justify-content: center;

    .btnSendEmail {
        background-color: #000;
        color: #ece9e9;
        height: fit-content;
    }
}
</style>
