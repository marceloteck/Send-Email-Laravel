<template>
    <div class="tags-input" @click="autoFocusInput" @focusin="autoFocusInput">
        <div class="row">
            <div class="col-11">
                <div class="placeholderInfo" v-if="valueTags">
                    Você pode colocar vários email separdos por virgula
                </div>
                <div
                    v-for="(tag, index) in tags"
                    :key="index"
                    class="tag"
                    :class="{ invalid: !isEmailValid(tag) }"
                >
                    {{ tag }}
                    <button class="remove-button" @click="removeTag(index)">
                        X
                    </button>
                </div>
                <input
                    type="text"
                    class="inputTags"
                    ref="inputRef"
                    v-model="newTag"
                    @keydown.enter.prevent="addTag"
                    @input="updateInputWidth"
                    :style="{ width: inputWidth + 'px' }"
                />
            </div>
            <div class="col-1">
                <div
                    @click="ValueTagClear"
                    :style="{ display: flexVar }"
                    class="closeAll"
                >
                    X
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, nextTick, onMounted } from "vue";

const tags = ref([]);
const newTag = ref("");
const inputWidth = ref(40);
const inputRef = ref(null);
const flexVar = ref("none");
const valueTags = ref(false);

function addTag() {
    const trimmedTag = newTag.value.trim();
    if (trimmedTag) {
        const emailList = trimmedTag
            .replace(/,\s*$/, "")
            .split(",")
            .map((email) => email.trim());
        if (emailList.length > 0) {
            tags.value.push(...emailList);
        }
        newTag.value = "";
        verifynewTag();
        updateInputWidth();
    }
}

function removeTag(index) {
    tags.value.splice(index, 1);
    verifynewTag();
    isTagsValue();
}

onMounted(() => {
    updateInputWidth();
});

function updateInputWidth() {
    nextTick(() => {
        const inputElement = inputRef.value;
        if (inputElement) {
            const inputTextWidth = inputElement.value.length * 8;
            inputWidth.value = Math.max(inputTextWidth, 40);
        }
        isTagsValue();
    });
}
function isTagsValue() {
    valueTags.value = newTag.value
        ? false
        : tags.value.length > 0
        ? false
        : true;
}

function verifynewTag() {
    nextTick(() => {
        const firstTag = tags.value[0];
        flexVar.value = firstTag ? "flex" : "none";
    });
}

function ValueTagClear() {
    tags.value = [];
    flexVar.value = "none";
    isTagsValue();
}

function isEmailValid(email) {
    const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    return emailRegex.test(email);
}
function autoFocusInput() {
    nextTick(() => {
        const inputElement = inputRef.value;
        if (inputElement) {
            inputElement.focus();
        }
    });
}
</script>

<style lang="scss" scoped>
.row {
    width: 100%;
    align-items: center;

    .placeholderInfo {
        color: #424160;
        width: fit-content;
        position: absolute;
        padding-left: 8px;
    }

    .col-11 {
        cursor: text;
    }

    .inputTags,
    .inputTags:focus,
    .inputTags:active,
    .inputTags:focus-visible {
        outline: none !important;
        box-shadow: none !important;
        border: 0px solid #fff !important;
    }

    .closeAll {
        position: relative;
        background-color: rgba(72, 71, 100, 0.7);
        color: #fff;
        padding: 10px;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        border-radius: 50px;
        display: none;

        &:hover {
            background-color: rgba(72, 71, 100, 1);
        }
    }
}

.tags-input {
    display: flex;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-evenly;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    overflow: hidden;

    .tag {
        display: inline-flex;
        align-items: center;
        background-color: #e2e8f0;
        border-radius: 4px;
        padding: 4px;
        margin-right: 4px;
        margin-top: 4px;

        &.invalid {
            background-color: #fbd5d5;
        }

        .remove-button {
            margin-left: 4px;
            border: none;
            background-color: transparent;
            font-weight: bold;
            cursor: pointer;
        }
    }
}
</style>
