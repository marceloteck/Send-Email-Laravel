<template>
    <main>
        <form @submit.prevent="SubmitSend">
            <div class="group" v-for="item in inputItens" :key="item.name">
                <input
                    v-model="formSend[item.name]"
                    required
                    :name="item.name"
                    :id="item.title"
                    class="input"
                    type="text"
                />
                <span class="highlight"></span>
                <span class="bar"></span>
                <label>{{ item.title }}</label>
            </div>
            <button type="submit" class="sendbtn btn">Enviar</button>
        </form>
    </main>
</template>

<script setup>
import { ref } from "vue";
import { useForm, router } from "@inertiajs/vue3";
const props = defineProps({ resposta: String, status: String });

const formSend = useForm({
    name: "",
    job: "",
    email: "",
    whatsapp: "",
    codtecno: "",
    linkedin: "",
    github: "",
    facebook: "",
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

const SubmitSend = () => {
    try {
        router.post(route("SendEmail"), formSend, {
            onBefore: (visit) => {},
            onStart: (visit) => {},
            onProgress: (progress) => {},
            onSuccess: (page) => {
                Toast.fire({ icon: props.status, title: props.resposta });
            },
            onError: (errors) => {
                Toast.fire({ icon: props.status, title: props.resposta });
            },
            onCancel: () => {},
            onFinish: (visit) => {},
        });
    } catch (error) {
        Toast.fire({
            icon: "error",
            title: "Atualize a página, ocorreu algum erro!",
        });
    }
};
</script>

<style lang="css">
.group {
    position: relative;
    width: 100%;
    margin-top: 25px;
}

.sendbtn {
    position: relative;
    margin-top: 25px;
    background: #535274;
    color: #fff;
    width: 100%;
}
.sendbtn:hover {
    background: rgba(83, 82, 116, 0.8);
    color: #fff;
}

.input {
    font-size: 16px;
    padding: 10px 10px 10px 5px;
    display: block;
    width: 100%;
    border: none;
    border-bottom: 1px solid rgba(81, 81, 81, 0.8);
    background: transparent;
}

.input:focus {
    outline: none;
}

label {
    color: #999;
    font-size: 16px;
    font-weight: normal;
    position: absolute;
    pointer-events: none;
    left: 5px;
    top: 10px;
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

.input:focus ~ label,
.input:valid ~ label {
    top: -20px;
    font-size: 14px;
    color: #5264ae;
}

.bar {
    position: relative;
    display: block;
    width: 100%;
}

.bar:before,
.bar:after {
    content: "";
    height: 2px;
    width: 0;
    bottom: 1px;
    position: absolute;
    background: rgba(82, 100, 174, 0.8);
    transition: 0.2s ease all;
    -moz-transition: 0.2s ease all;
    -webkit-transition: 0.2s ease all;
}

.bar:before {
    left: 50%;
}

.bar:after {
    right: 50%;
}

.input:focus ~ .bar:before,
.input:focus ~ .bar:after {
    width: 50%;
}

.highlight {
    position: absolute;
    height: 60%;
    width: 100%;
    top: 25%;
    left: 0;
    pointer-events: none;
    opacity: 0.5;
}

.input:focus ~ .highlight {
    animation: inputHighlighter 0.3s ease;
}

@keyframes inputHighlighter {
    from {
        background: #5264ae;
    }

    to {
        width: 0;
        background: transparent;
    }
}
</style>
