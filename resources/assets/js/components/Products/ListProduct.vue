<template>
    <div>
        <v-server-table :columns="columns" url="/api/products" :options="options" ref="table"></v-server-table>
    </div>
</template>

<script>
    export default {
        name: "list-product",

        created(){
            this.$parent.$on('createProduct', isCreate =>{ if(isCreate) this.onUpdate() })
        },

        data () {
            return {
                columns: ['id', 'name', 'unit_value' ],
                options: {
                    perPage: 5,
                    perPageValues: [ 5, 10, 15, 20 ],
                    headings: {
                        id: 'ID',
                        name: 'Nombre',
                        unit_value: 'Valor Unitario'
                    },
                    sortable: ['id', 'name'],
                    filterable: ['id', 'name'],
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