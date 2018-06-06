<template>
    <span class="help-block align-error">
        <slot></slot>
    </span>
</template>

<script>

    export default {

        props: ['errors']

    }

</script>

<style scoped>
    .align-error{
        margin-left:16px;
        color: #a94442;
    }
</style>