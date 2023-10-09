<template>
    <navbar :isLoggindStatus="props.isLoggindStatus" />
    <main>
        <div class="container emailBox">
            <div class="row">LINHA A CIMA</div>
            <div class="row">
                <div class="col-12 col-xl-3 card-item">
                    <div class="barraMenu">BARRAMENU</div>
                    <div class="bodyItensMenu">corpoMenu</div>
                </div>
                <div class="col-12 col-xl-9 card-item">
                    <div class="barraMenu">MENUBARRA</div>
                    <div class="boxItemMenu">CORPO DO EMAIL</div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
const props = defineProps(["isLoggindStatus"]);
</script>

<style lang="scss">
.emailBox {
    padding-top: 30px;

    .row {
        justify-content: space-between !important;

        .boxItemMenu {
            width: 100;
            height: 100%;
        }

        .card-item {
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
            }
            .bodyItensMenu {
                position: relative;
                width: 100%;
            }
        }
        .col-3 {
            position: relative;
        }
    }
}
</style>
