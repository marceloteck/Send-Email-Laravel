<template>
    <!-- As a heading -->
    <nav
        class="navbar navbar-expand-lg bg-white border border-top-0 border-dark border-opacity-10"
    >
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <span class="navbar-brand mb-0 h1">Inbox.dev</span>
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div
                class="collapse navbar-collapse d-flex justify-content-end"
                id="navbarNav"
            >
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <Link
                            class="nav-link active"
                            aria-current="page"
                            :href="route('index')"
                            >Inicio</Link
                        >
                    </li>
                    <li class="nav-item">
                        <Link class="nav-link" :href="route('editingEmail')"
                            >Editar Email</Link
                        >
                    </li>
                    <li class="nav-item" v-if="props.canLogin">
                        <Link class="nav-link" :href="route('login')"
                            >Login</Link
                        >
                    </li>
                    <li class="nav-item" v-if="props.canRegister">
                        <Link class="nav-link" :href="route('register')"
                            >Cadastrar</Link
                        >
                    </li>
                    <li class="nav-item" v-if="props.isLoggindStatus">
                        <Link
                            class="nav-link"
                            :href="route('logout')"
                            method="post"
                            as="button"
                            >Sair</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
const props = defineProps(["canLogin", "canRegister", "isLoggindStatus"]);
console.log(props.isLoggindStatus);
</script>

<style lang="scss">
.container-fluid {
    a,
    Link {
        text-decoration: none;
    }
    .navbar-nav {
        width: fit-content;
    }
}
</style>
