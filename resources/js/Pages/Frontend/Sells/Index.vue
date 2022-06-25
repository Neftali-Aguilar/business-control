<template>
    <div>
        <div class='px-4 md:px-10 mx-auto w-full -m-24'>
            <div class='flex flex-wrap'>
                <div class='w-full px-4'>
                    <div
                        class='relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0'>
                        <div class='rounded-t bg-white mb-0 px-6 py-6'>
                            <div class='text-center flex justify-between'>
                                <h6 class='text-blueGray-700 text-xl font-bold'>
                                    Listado de ventas
                                </h6>
                                <button
                                    class='bg-green-700 hover:bg-green-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150'
                                    type='button'>
                                    Crear venta
                                </button>
                            </div>
                        </div>
                        <div class='flex-auto px-4 lg:px-10 py-10 pt-0 overflow-x-scroll'>
                            <table class='items-center w-full bg-transparent border-collapse'>
                                <thead>
                                <tr>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Id
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Fecha
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Producto(s)
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Total
                                    </th>
                                    <th class='px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100'>
                                        Accíon
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4 text-left flex items-center'>
                                        # 1
                                    </th>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        2027-10-01
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        Carro 1
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        <i class='fas fa-circle text-orange-500 mr-2'></i>
                                        $ 60.00
                                    </td>
                                    <td class='border-t-0 px-6 border-l-0 border-r-0 text-md whitespace-nowrap p-4'>
                                        <a href='#'
                                           class='bg-blue-500 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-lg outline-none mr-1 ease-linear transition-all duration-150'>
                                            Ver venta
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Layout from '../Shared/Layout';

export default {
    name: 'Index',
    layout: Layout
};
</script>

<style scoped>

</style>

