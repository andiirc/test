<template>
    <div class="panel panel-default">
        <div class="panel-heading">Lista de productos</div>

        <div class="panel-body">
            <list-product />
        </div>
    </div>
</template>

<script>
    import ListProducts from "./ListProduct.vue";

    export default {
        name: "products",
        components: {
            'list-product': ListProducts
        },
        data(){
            return {

            }
        }
    }
</script>

<style scoped>

</style>