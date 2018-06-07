<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">Crear Inventario</div>

            <div class="panel-body">
                <form >
                    <div class="row col-sm-12">

                        <div class="form-group col-sm-6">

                            <div class="col-sm-12">
                                <label name="product" class="col-sm-12">Producto</label>
                                <el-select id="product" v-model="stock.product_id" filterable remote
                                           reserve-keyword clearable placeholder="Seleccionar producto"
                                           :remote-method="getProducts" class="col-sm-12">
                                        <el-option  v-for="item in options" :key="item.value"
                                        :label="item.label" :value="item.value">
                                        </el-option>
                                </el-select>
                                <form-error v-if="errors.product_id" :errors="errors">
                                 {{ errors.product_id }}
                                </form-error>
                            </div>

                        </div>

                        <div class="form-group col-sm-6">
                            <label for="lot">Lote</label>
                            <input type="text" class="form-control" id="lot" placeholder="Lote" v-model="stock.lot">
                            <form-error v-if="errors.lot" :errors="errors">
                                {{ errors.lot }}
                            </form-error>
                        </div>

                    </div>

                    <div class="row col-sm-12">

                        <div class="form-group col-sm-6" >
                            <div class="col-sm-12">
                                <label for="due_date" class="col-sm-12">Fecha Caducidad</label>
                                <div class="col-sm-12">
                                <el-date-picker v-model="stock.due_date" type="date"
                                            placeholder="Fecha" id="due_date" format="yyyy-MM-dd"
                                            value-format="yyyy-MM-dd" style="width: 100%">
                                </el-date-picker>
                                </div>
                                <form-error v-if="errors.due_date" :errors="errors">
                                    {{ errors.due_date }}
                                </form-error>
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="quantity">Cantidad</label>
                            <input type="number" class="form-control" id="quantity" placeholder="Cantidad" v-model="stock.quantity">
                            <form-error v-if="errors.quantity" :errors="errors">
                                {{ errors.quantity }}
                            </form-error>
                        </div>

                    </div>

                </form>
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-primary" @click.prevent="create">Guardar</button>
            </div>
        </div>

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
                value: [],
                options: [],
                errors: []
            }
        },

        methods:{

            create(){
                this.$http.post( '/api/stocks', this.stock ).then( res => {
                    this.$set(this.$data, 'errors', [])
                    this.clearInputs()
                    this.showNotify()
                    this.$emit('createStock', true)
                }).catch(err => {
                    if(err) this.$set(this.$data, 'errors', err.response.data.errors)
                })
            },

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
            },

            getProducts(item){
                if (item !== '') {
                    this.$http.get(`/api/products/${item}`).then(res => {
                        this.options = this.mapProducts(res.data.data)
                    }).catch(err => {
                        console.log(err)
                    })
                }
            },

            mapProducts(products){
                if (products !== null) {
                    return products.map( item => {
                        return {value: item.id, label: item.name }
                    })
                }
            }

        }

    }
</script>

<style scoped>

</style>