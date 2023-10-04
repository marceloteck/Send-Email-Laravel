<template>
    <AppHead title="Login" />
    <navbar />
    <main class="mainLogin">
        <div class="login wrap">
            <form @submit.prevent="submit">
                <div class="h1Ln">Login</div>
                <input
                    v-model="form.email"
                    type="text"
                    name="email"
                    id="email"
                    placeholder="Email"
                    pattern="^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$"
                    required
                    autofocus
                />
                <input
                    v-model="form.password"
                    type="password"
                    name="password"
                    id="password"
                    placeholder="Password"
                />
                <input
                    type="submit"
                    value="Login"
                    :class="['btnLn', { 'opacity-25': form.processing }]"
                    :disabled="form.processing"
                />
            </form>
        </div>
    </main>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const erroInfo = () => {
    // console.log(form.errors);
    // console.log("email:");
    // console.log(form.errors.email);
    // console.log("senha");
    // console.log(form.errors.password);

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
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
    erroInfo();
};
</script>

<style lang="css" scope>
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
    height: 400px;
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
    -webkit-appearance: none;
}

.login input[type="submit"],
.login input[type="button"],
.h1Ln {
    border: 0;
    outline: 0;
    width: 100%;
    padding: 13px;
    margin: 40px 0 0 0;
    border-radius: 500px;
    font-weight: 600;
    animation: bounce2 1.6s;
}

.h1Ln {
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

.login input[type="text"] {
    animation: bounce 1s;
    -webkit-appearance: none;
}

.login input[type="password"] {
    animation: bounce1 1.3s;
}

.ui {
    font-weight: bolder;
    background: -webkit-linear-gradient(#b563ff, #535efc, #0ec8ee);
    -webkit-background-clip: text;
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
