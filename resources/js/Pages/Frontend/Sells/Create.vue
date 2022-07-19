<template>
    <Head>
        <title>Crear venta</title>
        <meta name='description' content='Your page description'>
    </Head>
    <div>
        <div class='px-4 md:px-10 mx-auto w-full -m-24'>
            <div class='flex flex-wrap'>
                <div class='w-full px-4'>
                    <div
                        class='relative min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0'>
                        <div class='rounded-t bg-white mb-0 px-6 py-6'>
                            <div class='text-center flex justify-between items-center'>
                                <h6 class='text-blueGray-700 text-xl'>
                                    Crear nueva venta
                                </h6>
                                <button
                                    class='bg-green-500 hover:bg-green-700 text-white text-md px-4 py-2 rounded shadow ease-linear transition-all duration-300'
                                >
                                    Agregar Producto
                                </button>
                            </div>
                        </div>
                        <div class='px-4 lg:px-10 py-10 pt-0'>
                            <form @submit.prevent="form.post(route('sells.store'))" class='flex w-full flex-col'>
                                <table class='items-center w-full bg-transparent border-collapse'>
                                    <thead>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        ID
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        Nombre
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        Precio
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        Cantidad
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        Total
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 font-semibold text-left bg-blueGray-50 text-blueGray-500'>
                                        Acción
                                    </th>
                                    </thead>
                                    <tbody>
                                    <tr v-for='product in products' :key='product.id'>
                                        <td class='p-6 text-md'>
                                            # {{ product.id }}
                                        </td>
                                        <td class='p-6 text-md'>
                                           {{ product.name }}
                                        </td>
                                        <td class='p-6 text-md'>
                                            $ {{ product.price }}
                                        </td>
                                        <td class='p-6 text-md text-center'>
                                            1
                                        </td>
                                        <td class='p-6 text-md'>
                                            $ {{ product.price }}
                                        </td>
                                        <td class='p-6 text-md'>
                                            <button
                                                type='button'
                                                @click='removeProduct(product.id)'
                                                class='bg-red-500 hover:bg-red-700 text-white text-md px-4 py-2 rounded shadow ease-linear transition-all duration-300'
                                            >
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class='hidden'>
                                    <div class='w-full my-2'>
                                        <label for='name'>Nombre</label>
                                        <input
                                            class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                    </div>
                                    <div class='w-full my-2'>
                                        <label for='price'>Precio</label>
                                        <input
                                            type='number' min='0'
                                            class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                    </div>
                                    <div class='w-full my-2'>
                                        <label for='quantity'>Cantidad</label>
                                        <input

                                            type='number' min='0'
                                            class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                    </div>
                                    <div class='w-full my-2'>
                                        <label for='is_active'>¿ Activo ?</label>
                                        <select name='is_active'
                                                class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                            <option selected value='1'>Sí</option>
                                            <option value='0'>No</option>
                                        </select>
                                    </div>
                                    <div class='w-full my-5'>
                                        <button
                                            class='bg-blue-500 text-white font-bold uppercase text-md px-4 py-2 rounded shadow hover:shadow-lg outline-none mr-1 ease-linear transition-all duration-150 '>
                                            Guardar
                                        </button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, useRemember } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';
import { ref } from 'vue';

export default {
    name: 'Create',
    components: {
        Head
    },
    props: {
        products: Object
    },
    layout: Layout,
    setup(props) {
        console.log(props);
        const removeProduct = (product_id) => {
            props.products.slice(1)
        };

        return{
            removeProduct,
        }
    }
};
</script>

<style scoped>

</style>

