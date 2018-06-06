<template>
    <div>
        <v-server-table :columns="columns" url="/api/products" :options="options" ref="table">
            <button type="button" slot="edit" slot-scope="props" class="btn btn-info" @click="edit(props.row)">Editar</button>
            <button type="button" slot="remove" slot-scope="props" class="btn btn-danger" @click="remove(props.row)">Eliminar</button>
        </v-server-table>
    </div>
</template>

<script>
    export default {
        name: "list-product",
        data () {
            return {
                columns: ['id', 'name','edit', 'remove' ],
                options: {
                    perPage: 5,
                    perPageValues: [ 5, 10, 15, 20 ],
                    headings: {
                        id: 'ID',
                        name: 'Nombre',
                        edit: 'Editar',
                        remove: 'Eliminar'
                    },
                    sortable: ['id', 'name', ],
                    filterable: ['id', 'name'],
                    filterByColumn: true,
                }
            }
        },
        methods: {
            edit (row) {
                console.log(row);
            },
            remove (row) {
                console.log(row);
            },
            onUpdate() {
                this.$refs.table.refresh();
            }
        }
    }
</script>

<style scoped>

</style>