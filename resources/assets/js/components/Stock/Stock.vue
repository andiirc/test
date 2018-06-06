<template>
    <div>

        <!--<div class="panel panel-default">
            <div class="panel-heading">Crear Inventario</div>

            <div class="panel-body">
                <form >
                    <div class="form-group col-sm-6">
                        <label for="name">Nombre del producto</label>
                        <input type="text" class="form-control" id="name" placeholder="Nombre del producto" v-model="product.name">
                        <form-error v-if="errors.name" :errors="errors">
                            {{ errors.name }}
                        </form-error>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="unit_value">Precio Unitario</label>
                        <input type="text" class="form-control" id="unit_value" placeholder="Precio Unitario" v-model="product.unit_value">
                        <form-error v-if="errors.unit_value" :errors="errors">
                            {{ errors.unit_value }}
                        </form-error>
                    </div>
                    <button type="submit" class="btn btn-primary" @click.prevent="create">Guardar</button>
                </form>
            </div>
        </div>-->

        <div class="panel panel-default">
            <div class="panel-heading">Inventario</div>

            <div class="panel-body">
                <list-stock />
            </div>
        </div>

    </div>
</template>

<script>
    import ListStock from "./ListStock.vue";
    import FormError from '../FormErros.vue'

    export default {

        name: "stocks",

        components: {
            'list-stock': ListStock,
            'form-error': FormError,
        },

        data(){
            return {
                stock: {
                    lot: '',
                    due_date: '',
                    quantity: '',
                    product_id: ''
                },
                errors: []
            }
        },

        methods:{

            /*create(){
                this.$http.post( '/api/products', this.product ).then( res => {
                    this.$set(this.$data, 'errors', [])
                    this.clearInputs()
                    this.showNotify()
                    this.$emit('createProduct', true)
                }).catch(err => {
                    if(err) this.$set(this.$data, 'errors', err.response.data.errors)
                })
            },*/

            clearInputs(){
                this.stock = {
                    lot: '',
                    due_date: '',
                    quantity: '',
                    product_id: ''
                }
            },

            showNotify(){
                this.$notify({
                    message: 'Producto agregado al inventario exitosamente',
                    type: 'success',
                    offset: 60
                })
            }

        }

    }
</script>

<style scoped>

</style>