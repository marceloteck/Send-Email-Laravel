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
