<template>
    <div>

        <div class="panel panel-default">
            <div class="panel-heading">Crear Productos</div>

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
                </form>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary" @click.prevent="create">Guardar</button>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Lista de productos</div>

            <div class="panel-body">
                <list-product />
            </div>
        </div>

    </div>
</template>

<script>
    import ListProducts from "./ListProduct.vue";
    import FormError from '../FormErros.vue'
    /*import 'element-ui/lib/theme-chalk/index.css'
    import { Notification } from 'element-ui'
    import lang from 'element-ui/lib/locale/lang/es'
    import locale from 'element-ui/lib/locale'
    locale.use(lang)*/

    export default {

        name: "products",

        components: {
            'list-product': ListProducts,
            'form-error': FormError,
        },

        data(){
            return {
                product: {
                    name: '',
                    unit_value: null,
                },
                errors: []
            }
        },

        methods:{

            create(){
                this.$http.post( '/api/products', this.product ).then( res => {
                    this.$set(this.$data, 'errors', [])
                    this.clearInputs()
                    this.showNotify()
                    this.$emit('createProduct', true)
                }).catch(err => {
                    if(err) this.$set(this.$data, 'errors', err.response.data.errors)
                })
            },

            clearInputs(){
               this.product = { name: '', unit_value: null }
            },

            showNotify(){
                this.$notify({
                    message: 'Producto creado exitosamente',
                    type: 'success',
                    offset: 60
                })
            }

        }

    }
</script>

<style scoped>

</style>