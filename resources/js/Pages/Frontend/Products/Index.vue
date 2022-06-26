<template>
    <Head>
        <title>Productos</title>
        <meta name='description' content='Your page description'>
    </Head>
    <div>
        <div class='px-4 md:px-10 mx-auto w-full -m-24'>
            <div class='flex flex-wrap'>
                <div class='w-full px-4'>
                    <div
                        class='relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0'>
                        <div class='rounded-t bg-white mb-0 px-6 py-6'>
                            <div class='text-center flex justify-between items-center'>
                                <h6 class='text-blueGray-700 text-xl font-bold'>
                                    Listado de productos
                                </h6>
                                <input type='text' placeholder='Buscar producto' class='border-gray-200 w-auto w-6/12'>
                                <Link
                                    :href="route('products.create')"
                                    class='bg-green-700 hover:bg-green-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150'
                                >
                                    Crear producto
                                </Link>
                            </div>
                        </div>
                        <div class='flex-auto px-4 lg:px-10 py-10 pt-0  overflow-x-scroll'>
                            <table class='items-center w-full bg-transparent border-collapse'>
                                <thead>
                                <tr>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Id
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Nombre
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Precio
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Stock
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Accíon
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for='product in products.data' :key='product.id'>
                                    <th class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left flex items-center'>
                                        {{ product.id }}
                                    </th>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        {{ product.name }}
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        $ {{ product.price.toFixed(2) }}
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        {{ product.quantity }} {{ product.quantity === 1 ? 'Pieza' : 'Piezas' }}
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4 flex items-center'>
                                        <span v-if='product.is_active'
                                              class='w-3 h-3 rounded-full block bg-green-500 mr-2'></span>
                                        <span v-else class='w-3 h-3 rounded-full block bg-red-500 mr-2'></span>
                                        {{ product.is_active ? 'Activo' : 'Inactivo' }}
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        <Link :href="route('products.show', product)"
                                              class='bg-blue-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-lg outline-none mr-1 ease-linear transition-all duration-150'>
                                            Ver producto
                                        </Link>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <Pagination class='mt-6' :links='products.links' />

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from '../../Shared/Pagination';
import { Head, usePage } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';
import { onMounted } from 'vue';
import Swal from 'sweetalert2'


export default {
    name: 'Index',
    components: {
        Head,
        Pagination
    },
    layout: Layout,
    props: {
        products: Object,
    },
    setup() {
        const displayMessage= (message) => {
            Swal.fire({
                title: message,
                icon: 'success',
                confirmButtonText: 'Cerrar'
            });
        }
        const alertMessage = onMounted(() => {
            const { message: flashMessage } = usePage().props.value.flash
            if ( flashMessage ) displayMessage(flashMessage)
        })
        return {
            alertMessage
        };
    }
};
</script>

<style scoped>

</style>

