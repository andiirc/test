<template>
    <div>
        <v-server-table :columns="columns" url="/api/orders" :options="options" ref="table"></v-server-table>
    </div>
</template>

<script>
    export default {
        name: "list-order",

        data () {
            return {
                columns: ['id', 'number_order', 'total', 'sending_value', 'status'],
                options: {
                    perPage: 5,
                    perPageValues: [ 5, 10, 15, 20 ],
                    headings: {
                        id: 'ID',
                        number_order: 'Numero Orden',
                        total: 'Total',
                        sending_value: 'Costo Envio',
                        status: 'Estado',
                    },
                    sortable: ['id', 'status' ],
                    filterable: ['id', 'status' ],
                    filterByColumn: true,
                }
            }
        }
    }
</script>

<style scoped>

</style>
