<template>
    <div>
        <button @click="renderMJML">Render MJML</button>
        <div v-if="html">
            <h1>HTML Responsivo:</h1>
            <div v-html="html"></div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            html: "",
        };
    },
    methods: {
        async renderMJML() {
            const apiUrl = "https://api.mjml.io/v1/render";
            const auth = {
                username: "eca6d572-a8f6-4f1e-bb08-b792ed1864c5",
                password: "c7204724-9e7a-4ba1-8db8-6a3dbd1a112a",
            };
            const mjmlData = {
                mjml: "<mjml><mj-body><mj-container><mj-section><mj-column><mj-text>Hello World</mj-text></mj-column></mj-section></mj-container></mj-body></mjml>",
            };

            // try {
                const response = await axios.post(apiUrl, mjmlData, { auth });
                this.html = response.data.html;

                console.error(response);
            // } catch (error) {
            //     console.error(error);
            // }
        },
    },
};
</script>
