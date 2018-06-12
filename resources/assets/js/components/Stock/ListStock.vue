<template>
    <div>
        <v-server-table :columns="columns" url="/api/stocks" :options="options" ref="table"></v-server-table>
    </div>
</template>

<script>
    export default {
        name: "list-stock",

        created(){
            this.$parent.$on('createStock', isCreate =>{ if(isCreate) this.onUpdate() })
        },

        data () {
            return {
                columns: ['id', 'name', 'unit_value', 'lot', 'quantity', 'value_item', 'due_date' ],
                options: {
                    perPage: 5,
                    perPageValues: [ 5, 10, 15, 20 ],
                    headings: {
                        id: 'ID',
                        name: 'Nombre',
                        unit_value: 'Valor Unitario',
                        lot: 'Lote',
                        quantity: 'Cantidad',
                        value_item: 'Valor Total',
                        due_date: 'Fecha Caducidad'
                    },
                    texts: {
                        filter: "Filtrar:",
                        filterBy: 'Filtrar por {column}',
                        count:' '
                    },
                    /*dateColumns:['due_date'],
                    dateFormat: 'YYYY-MM-DD',
                    datepickerOptions: {
                        showDropdowns: true,
                        autoUpdateInput: true,
                    },*/
                    sortable: ['name', 'lot' ],
                    filterable: ['name', 'lot' ],
                    filterByColumn: true,
                }
            }
        },
        methods: {
            onUpdate() {
                this.$refs.table.refresh()
            }
        }
    }
</script>

<style scoped>

</style>