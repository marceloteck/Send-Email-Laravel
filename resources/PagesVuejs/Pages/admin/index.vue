<template>
    <AppHead title="Administração do email" />
    <navbar :isLoggindStatus="props.isLoggindStatus" />
    <main>
        <div class="container emailBox">
            <div class="row">
                <h2>
                    <i class="fa fa-check-square-o"></i> Este é o sobre usado
                    para enviar o email

                    <span class="iconTime"
                        ><i class="fa fa-external-link"></i
                    ></span>
                </h2>
            </div>
            <div class="row">
                <div class="col-12 col-xl-3 card-item">
                    <div class="barraMenu">
                        <Link :href="route('index.newEmail')"
                            ><div class="icon"><i class="fa fa-edit"></i></div
                        ></Link>
                        <div class="icon"><i class="fa fa-trash"></i></div>
                        <div class="icon"><i class="fa fa-th-list"></i></div>
                    </div>
                    <div class="cardEmail" v-for="link in 5" :key="link">
                        <div class="container">
                            <div class="title">{{ ViewSend }}</div>
                            <div class="icon">
                                <i class="fa fa-trash"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-9 card-item">
                    <div class="barraMenu">
                        <div class="start">
                            <div class="emailSend">
                                Email enviado para
                                <strong>{{ emailEnviado }}</strong>
                            </div>
                            <div class="endContent">
                                <span
                                    class="title"
                                    title="09 de Outubro de 2023 "
                                    >12:24 (há 12 horas)</span
                                >
                            </div>
                        </div>
                    </div>
                    <div class="boxItemMenu">
                        <iframe
                            :src="route('viewEmail')"
                            frameborder="0"
                            style="width: 100%; height: 100%"
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
const props = defineProps(["isLoggindStatus"]);

function corrigirEmail(email) {
    const username = email.split("@")[0];
    const regex = /[.\-_]/g;
    const usernameCorrigido = username.replace(regex, " ");
    return usernameCorrigido;
}

// const emailEnviado = "Dennis.kumagai@wayon.global";
const emailEnviado = "marcellosh_12@hotmail.com";
const ViewSend = corrigirEmail(emailEnviado);
</script>

<style lang="scss">
.emailBox {
    padding-top: 30px;

    .row {
        justify-content: space-between !important;

        h2 {
            font-weight: 400;
            font-size: 2rem;
            padding-bottom: 10px;

            .iconTime {
                padding: 15px;
                cursor: pointer;
                margin-right: 5px;
                font-size: 1.5rem;
            }
        }

        .boxItemMenu {
            width: 100;
            height: 100%;
        }

        .card-item {
            // background-color: #ffffff;
            border: 0.01rem solid rgba(223, 222, 218, 0.5);
            border-radius: 3px;
            min-height: 75vh;
            height: auto;
            padding: 0px;
            padding-bottom: 25px;

            .barraMenu {
                background: rgb(224, 224, 224);
                background: linear-gradient(
                    350deg,
                    rgba(224, 224, 224, 1) 0%,
                    rgba(180, 171, 171, 1) 100%
                );
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                align-content: stretch;
                justify-content: flex-end;
                align-items: baseline;
                width: 100%;
                height: 60px;
                border-radius: 3px 3px 0px 0px;
                a,
                Link {
                    text-decoration: none;
                    color: #212529;
                }
                .icon {
                    width: fit-content;
                    position: relative;
                    display: flex;
                    align-items: center;
                    padding: 25px;
                    cursor: pointer;
                    height: 60px;
                    .fa {
                        font-size: 1.3rem;
                    }
                }
                .icon:hover {
                    background-color: rgb(175, 174, 174);
                    background: linear-gradient(
                        350deg,
                        rgba(rgb(208, 204, 204), 1) 0%,
                        rgb(175, 174, 174) 100%
                    );
                }
                .start {
                    width: 100%;
                    height: 60px;
                    padding-left: 15px;
                    display: flex;
                    align-items: center;
                    justify-content: space-between;

                    .emailSend {
                        position: relative;
                        font-size: 0.9rem;
                    }
                    .endContent {
                        position: relative;
                        padding-right: 15px;

                        .title {
                            font-size: 0.9rem;
                        }
                    }
                }
            }
            .cardEmail {
                margin-top: 3px;
                width: 100%;
                height: 45px;
                background: rgb(245, 245, 245);
                background: linear-gradient(
                    350deg,
                    rgba(245, 245, 245, 1) 0%,
                    rgb(240, 230, 230) 100%
                );
                border: 0.8px solid rgb(240, 230, 230);
                display: flex;
                align-items: center;

                .container {
                    display: flex;
                    justify-content: space-between;
                    overflow: hidden;

                    .title {
                        width: fit-content;
                    }
                    .icon {
                        width: fit-content;
                        padding: 5px;
                        cursor: pointer;
                        position: relative;
                        margin-right: -100px;
                        transition: all 0.2s ease-in-out;
                        opacity: 0;
                        z-index: -1;
                    }
                }
            }
            .cardEmail:hover {
                background-color: rgb(199, 197, 197);
                background: linear-gradient(
                    350deg,
                    rgba(rgb(208, 204, 204), 1) 0%,
                    rgb(204, 203, 203) 100%
                );
                .icon {
                    margin-right: 0px;
                    opacity: 1;
                    z-index: 1;
                }
            }
        }
        .col-3 {
            position: relative;
        }
    }
}
</style>
