<template>
    <div>

        <div class="panel panel-default">
            <div class="panel-heading">Lista de Ordenes</div>

            <div class="panel-body">
                <list-order></list-order>
            </div>
        </div>

    </div>
</template>

<script>
    import ListOrders from "./ListOrder.vue";

    export default {

        name: "products",

        components: {
            'list-order': ListOrders
        }

    }
</script>

<style scoped>

</style>