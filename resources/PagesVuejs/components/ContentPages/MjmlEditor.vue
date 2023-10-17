<template>
    <div id="gjs">
        <mjml>
            <mj-head>
                <mj-attributes>
                    <mj-all
                        font-family="'Helvetica Neue', Helvetica, Arial, sans-serif"
                    >
                    </mj-all>
                </mj-attributes>
                <mj-style inline="inline">
                    .body-section { -webkit-box-shadow: 1px 4px 11px 0px rgba(0,
                    0, 0, 0.15); -moz-box-shadow: 1px 4px 11px 0px rgba(0, 0, 0,
                    0.15); box-shadow: 1px 4px 11px 0px rgba(0, 0, 0, 0.15); }
                </mj-style>
                <mj-style inline="inline">
                    .text-link { color: #5e6ebf }
                </mj-style>
                <mj-style inline="inline">
                    .footer-link { color: #888888 }
                </mj-style>
            </mj-head>
            <mj-body background-color="#E7E7E7">
                <mj-section
                    full-width="full-width"
                    background-color="#040B4F"
                    padding-bottom="0"
                >
                    <mj-column width="100%">
                        <mj-text
                            color="#ffffff"
                            font-weight="bold"
                            align="center"
                            text-transform="uppercase"
                            font-size="16px"
                            letter-spacing="1px"
                            padding-top="30px"
                        >
                            Austin, TX
                            <br />
                            <span
                                style="
                                    color: rgb(151, 151, 151);
                                    font-weight: normal;
                                "
                                >-</span
                            >
                        </mj-text>
                    </mj-column>
                </mj-section>
                <mj-wrapper
                    padding-top="0"
                    padding-bottom="0"
                    css-class="body-section"
                >
                </mj-wrapper>
            </mj-body>
        </mjml>
    </div>
</template>

<script>
import grapesJS from "grapesjs";
import "grapesjs/dist/css/grapes.min.css";
import grapesJSMJML from "grapesjs-mjml";
import axios from "axios";
// import { Inertia } from "@inertiajs/inertia";

export default {
    mounted() {
        const editor = grapesJS.init({
            fromElement: true,
            container: "#gjs",
            plugins: [grapesJSMJML],
            pluginsOpts: {
                [grapesJSMJML]: {
                    /* ...options */
                },
            },
        });

        // Adicionando botão de salvar
        editor.Panels.addButton("options", [
            {
                id: "save",
                className: "fa fa-floppy-o",
                command: "save-db",
                attributes: { title: "Salvar" },
            },
        ]);

        // Comando para salvar no backend
        editor.Commands.add("save-db", {
            run(editor, sender) {
                alert("aqui");
                // sender && sender.set("active"); // ativa o botão
                // const mjml = editor.getHtml(); // obtém o código MJML
                // const html = editor.runCommand("mjml-get-code").html; // obtém o código HTML

                // // Enviar 'mjml' e 'html' para o backend
                // axios
                //     .post(route("index.postModeloEmail"), {
                //         mjml: mjml,
                //         html: html,
                //     })
                //     .then((response) => {
                //         // Lidar com a resposta usando Inertia
                //         // Inertia.post(
                //         //     route("index.postModeloEmail"),
                //         //     response.data
                //         // );
                //     })
                //     .catch((error) => {
                //         console.error(error);
                //     });
            },
        });
    },
};
</script>

<!--
<script>
import grapesJS from "grapesjs";
import "grapesjs/dist/css/grapes.min.css";
import grapesJSMJML from "grapesjs-mjml";

export default {
    mounted() {
        grapesJS.init({
            fromElement: true,
            container: "#gjs",
            plugins: [grapesJSMJML],
            pluginsOpts: {
                [grapesJSMJML]: {
                    /* ...options */
                },
            },
        });
    },
};
</script>
-->

<style>
/* Estilos adicionais, se necessário */
</style>
