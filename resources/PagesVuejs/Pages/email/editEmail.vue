<template>
    <AppHead title="Editar" />
    <navbar />
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-3">
                <div class="container card-item">
                    <sidebarMenu />
                </div>
            </div>
            <div class="col-12 col-xl-9">
                <div class="container card-item">
                    <iframe
                        :src="route('viewEmail')"
                        frameborder="0"
                        style="width: 100%; height: 100%"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup></script>

<style lang="scss">
.container {
    padding-top: 30px;

    .row {
        justify-content: space-between !important;

        .card-item {
            background-color: #ffffff;
            border: 0.01rem solid rgba(223, 222, 218, 0.5);
            border-radius: 3px;
            height: 650px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .col-3 {
            position: relative;
        }
    }
}
</style>
