<template>
    <AppHead title="Login" />
    <navbar />
    <main class="mainLogin">
        <div class="login wrap">
            <!-- <form @submit.prevent="submit"> -->
            <form>
                <div class="h1Ln">Cadastro</div>
                <input
                    v-model="form.name"
                    type="text"
                    name="name"
                    id="name"
                    placeholder="Nome Completo"
                    required
                    autofocus
                />

                <input
                    v-model="form.email"
                    type="email"
                    name="email"
                    id="email"
                    placeholder="Email"
                    pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                    required
                />
                <input
                    v-model="form.password"
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Senha"
                    required
                />
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    placeholder="Repita a Senha"
                    required
                />
                <input
                    @click="submit"
                    type="button"
                    value="Cadastrar"
                    :class="['btnLn', { 'opacity-25': form.processing }]"
                    :disabled="form.processing"
                />
            </form>
           <div class="LinkInfo"> <Link :href="route('login')">Login</Link></div>
        </div>
    </main>
</template>
<script setup>
import { useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const erroInfo = () => {
    if (form.errors.email) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: form.errors.email,
        });
    } else if (form.errors.password) {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: form.errors.password,
        });
    }
};

const submit = () => {
    form.post(route("register"), {
        onFinish: () => {
            form.reset("password", "password_confirmation");
            erroInfo();
        },
    });
};
</script>
<style lang="scss" scoped>
.mainLogin {
    position: relative;
    width: 100%;
    height: 92vh;
    display: flex;
    align-content: center;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.login {
    position: relative;
    width: 340px;
    height: 600px;
    background: #ffffff;
    /* background: #2c2c2c; */
    padding: 47px;
    padding-bottom: 57px;
    color: #1b1b1b;
    border-radius: 17px;
    border: 0.01rem solid rgba(223, 222, 218, 0.5);
    padding-bottom: 50px;
    font-size: 1.3em;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
        Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    box-shadow: 0px 0px 10px 1px rgba(83, 83, 83, 0.8);
}

.login input[type="email"],
.login input[type="text"],
.login input[type="password"] {
    opacity: 1;
    display: block;
    border: none;
    outline: none;
    width: 100%;
    padding: 13px 18px;
    margin: 20px 0 0 0;
    font-size: 0.8em;
    border-radius: 100px;
    background: #e8f0fd;
    /* background: #3c3c3c; */
    color: #1b1b1b;
}

.login input:focus {
    animation: bounce 1s;
    // -webkit-appearance: none;
}

.LinkInfo {
    width: 100%;
    padding: 0px !important;
    margin:  30px 0 0 0 !important;
    text-align: center;
    
    a, Link{
        text-decoration: none;
        color: #1b1b1b;
        font-size: 1rem;
    }
    a:hover, Link:hover{
        text-decoration: underline;
    }
}

.login input[type="submit"],
.login input[type="button"],
.h1Ln, .LinkInfo {
    border: 0;
    outline: 0;
    width: 100%;
    padding: 13px;
    margin: 40px 0 0 0;
    border-radius: 500px;
    font-weight: 600;
    animation: bounce2 1.6s;
}

.h1Ln, .LinkInfo {
    padding: 0;
    position: relative;
    top: -35px;
    display: block;
    margin-bottom: -0px;
    font-size: 1.3em;
}

.btnLn {
    background: linear-gradient(144deg, #af40ff, #5b42f3 50%, #00ddeb);
    color: #fff;
    padding: 16px !important;
}

.btnLn:hover {
    background: #1b1b1b;
    color: rgb(255, 255, 255);
    padding: 16px !important;
    cursor: pointer;
    transition: all 0.4s ease;
}

.login input[type="text"],
.login input[type="email"] {
    animation: bounce 1s;
    // -webkit-appearance: none;
}

.login input[type="password"] {
    animation: bounce1 1.3s;
}

.ui {
    font-weight: bolder;
    background: -webkit-linear-gradient(#b563ff, #535efc, #0ec8ee);
    // -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    border-bottom: 4px solid transparent;
    border-image: linear-gradient(0.25turn, #535efc, #0ec8ee, #0ec8ee);
    border-image-slice: 1;
    display: inline;
}

@media only screen and (max-width: 600px) {
    .login {
        width: 70%;
        padding: 3em;
    }
}

@keyframes bounce {
    0% {
        transform: translateY(-250px);
        opacity: 0;
    }
}

@keyframes bounce1 {
    0% {
        opacity: 0;
    }

    40% {
        transform: translateY(-100px);
        opacity: 0;
    }
}

@keyframes bounce2 {
    0% {
        opacity: 0;
    }

    70% {
        transform: translateY(-20px);
        opacity: 0;
    }
}
</style>

<!--
<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Name" />

                <TextInput
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.name"
                    required
                    autofocus
                    autocomplete="name"
                />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="Confirm Password" />

                <TextInput
                    id="password_confirmation"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="new-password"
                />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Already registered?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Register
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
-->
