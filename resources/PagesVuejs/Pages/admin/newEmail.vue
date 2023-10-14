<template>
    <AppHead title="Administração do email" />
    <LayoutEmailAdmin>
        <template v-slot:topAbout>
            <div class="send">
                <div class="col-11">
                    <VueTagsInput
                        ref="tagsInput"
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
        <template v-slot:bodyMenuLeft>
            <div class="container">
                <form>
                    <div
                        class="group"
                        v-for="item in inputItens"
                        :key="item.name"
                    >
                        <span v-if="formSend[item.name]">
                            <input
                                v-model="formSend[item.name]"
                                readonly
                                required
                                :name="item.name"
                                :id="item.title"
                                class="input"
                                type="text"
                            />
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>{{ item.title }}</label>
                        </span>
                    </div>
                    <button type="button" class="sendbtn btn">
                        Editar Informações
                    </button>
                </form>
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
                <button
                    @click="openLink(route('index.modeloEmail'))"
                    type="button"
                    class="btn btnSendEmail"
                >
                    Clique e escolher modelo de e-mail
                </button>
            </div>
        </template>
    </LayoutEmailAdmin>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm, router } from "@inertiajs/vue3";

const props = defineProps({
    resposta: String,
    status: String,
    tableProfessional: Array,
});

const formSend = useForm({
    name: props.tableProfessional[0].name,
    job: props.tableProfessional[0].job,
    email: props.tableProfessional[0].email,
    whatsapp: formatPhoneNumber(props.tableProfessional[0].whatsapp),
    codtecno: props.tableProfessional[0].codtecno,
    linkedin: props.tableProfessional[0].linkedin,
    github: props.tableProfessional[0].github,
    facebook: props.tableProfessional[0].facebook,
});

const inputItens = [
    { title: "Seu nome completo", name: "name" },
    { title: "Seu cargo", name: "job" },
    { title: "Email de contato", name: "email" },
    { title: "Principais Tecnologias", name: "codtecno" },
    { title: "Whatsapp", name: "whatsapp" },
    { title: "Linkedin", name: "linkedin" },
    { title: "GitHub", name: "github" },
    { title: "Facebook", name: "facebook" },
];

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

function formatPhoneNumber(number) {
    const cleanedNumber = String(number).replace(/\D/g, "");
    const match = cleanedNumber.match(/^(\d{2})(\d{4,5})(\d{4})$/);
    if (match) {
        return `(${match[1]}) ${match[2]}-${match[3]}`;
    }
    return number;
}

// const SubmitSend = () => {
//     try {
//         router.post(route("SendEmail"), formSend, {
//             onBefore: (visit) => {},
//             onStart: (visit) => {},
//             onProgress: (progress) => {},
//             onSuccess: (page) => {
//                 Toast.fire({ icon: props.status, title: props.resposta });
//             },
//             onError: (errors) => {
//                 Toast.fire({ icon: props.status, title: props.resposta });
//             },
//             onCancel: () => {},
//             onFinish: (visit) => {},
//         });
//     } catch (error) {
//         Toast.fire({
//             icon: "error",
//             title: "Atualize a página, ocorreu algum erro!",
//         });
//     }
// };

function openLink(link) {
    const width = 800; // Largura desejada da janela
    const height = 600; // Altura desejada da janela
    const left = (window.innerWidth - width) / 2; // Centraliza horizontalmente
    const top = (window.innerHeight - height) / 2; // Centraliza verticalmente

    const options = `width=${width},height=${height},left=${left},top=${top}`;
    window.open(link, "_blank", options);
}
</script>

<style lang="scss" scoped>
.sendbtn {
    position: relative;
    margin-top: 25px;
    background: rgba(83, 82, 116, 1);
    color: #fff;
    width: 100%;
}
.sendbtn:hover {
    background: rgba(83, 82, 116, 0.8);
    color: #fff;
}
.row {
    padding-right: 0px !important;
}
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
        padding: 9px;
        border-radius: 0px 3px 3px 0px;
    }
}

.input ~ label {
    top: -20px;
    font-size: 14px;
    color: #5264ae;
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
        color: #ffffff;
    }
    .inputAssunto:focus,
    .inputAssunto:focus-visible {
        outline: none;
        box-shadow: none;
        border-color: transparent;
        color: rgb(255, 255, 255);
    }
    .inputAssunto::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
}
.contentEmail {
    width: 100%;
    height: 100%;
    display: flex;
    align-content: center;
    justify-content: center;

    .btnSendEmail {
        width: 100%;
        color: #3c3939;
    }
    .btnSendEmail:active:focus {
        border: none;
        box-shadow: none;
        background-color: #dddddd;
    }
}
</style>
