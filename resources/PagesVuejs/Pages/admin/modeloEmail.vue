<template>
    <AppHead title="Modelos de email" />
    <main>
        <div class="navItem">
            <h4 class="text-center">Escolha um modelo de E-mail</h4>
        </div>
        <div class="container content">
            <div
                v-for="x in 13"
                :key="x"
                @click="selectCard(x)"
                :class="['template', { selected: validationCard(x) }]"
            >
                <div class="selectItem">
                    <checkbox :selected="validationCard(x)" />
                </div>
                <img
                    src="https://mjml.io/assets/img/index/austin.png"
                    alt="Escolha um modelo"
                />
                <div class="thumb_gallery">
                    <h4>Sexta-feira preta</h4>
                    <p class="ModelEmaildesc">
                        Um boletim informativo responsivo com ROI otimizado para
                        a Black Friday.
                    </p>
                    <div class="author-profile">
                        <a href="https://mjml.io/templates" target="_blank">
                            Acessar Mjml
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="config">
            <Link href="#">Criar novo modelo</Link>
            <button type="button" class="btn btnSend">Escolher</button>
        </div>
    </main>
</template>
<script setup>
import { ref } from "vue";

const selectedCard = ref(false);

const props = defineProps({
    modelosModel: {
        type: Object,
        required: true,
    },
});

function selectCard(card) {
    selectedCard.value = card;
}
function validationCard(value) {
    return value === selectedCard.value;
}
</script>

<style lang="scss" scoped>
main {
    padding-bottom: 35px;
    .navItem {
        width: 100%;
        padding: 10px;
        background-color: #ccc;
        border-bottom: rgb(136, 136, 136);
    }
    .content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;

        .selected {
            box-shadow: 2px 2px 5px rgba(106, 105, 224, 0.9) !important;
            border: 1px solid rgb(92, 123, 18) !important;
        }

        .template {
            margin-top: 50px;
            margin-bottom: 10px;
            width: 317px;
            height: 409px;
            border: 1px solid #e8e7e6;
            border-radius: 3px;
            position: relative;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;

            .selectItem {
                position: absolute;
                top: 0px;
                padding: 10px;
            }

            .thumb_gallery {
                border-top: 1px solid #e8e7e6;
                padding: 20px;
                position: absolute;
                bottom: 0;
                right: 0;
                left: 0;
                background-color: #fff;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
                min-height: 110px;

                .author-profile {
                    position: absolute;
                    width: 90%;
                    bottom: 10px;
                    a {
                        color: #848484;
                        font-weight: 500;
                        text-decoration: none;
                    }
                }
            }

            img {
                width: 100%;
            }
            h4 {
                font-size: 18px;
                line-height: 31px;
                text-align: left;
                margin: 0 0 0 10px;
            }
            .ModelEmaildesc {
                font-size: 13px;
                line-height: 22px;
                color: #afafaf;
                margin: 0 0 0 10px;
                overflow: hidden;
                height: 0;
                -webkit-transition: all 0.3s ease-in-out;
                transition: all 0.3s ease-in-out;
            }
            &:hover .ModelEmaildesc {
                height: 75px;
            }
        }
    }
    .config {
        position: fixed;
        bottom: 0px;
        width: 100%;
        padding: 5px 25px 5px 5px;
        background: linear-gradient(45deg, #dddddd, #cacaca);
        border-top: #848484;
        display: flex;

        Link,
        a {
            text-decoration: none;
            color: #222222;
            background-color: #868686;
            height: 100%;
        }

        .btnSend {
            background: linear-gradient(45deg, #ccc, #cacaca);
            transition: background-color 0.3s;
            float: right;
            padding: 15px 30px 15px 30px;
            font-weight: 600;
            border: 0.8px solid #848484;

            &:hover {
                background: linear-gradient(45deg, #ccc, #868686);
            }
            &:active {
                box-shadow: none;
                background-color: #868686;
            }
        }
    }
}
</style>
