<template>
    <Head>
        <title>Crear Producto</title>
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
                                    Crear nuevo producto
                                </h6>
                            </div>
                        </div>
                        <div class='px-4 lg:px-10 py-10 pt-0'>
                            <form @submit.prevent="form.post(route('products.store'))" class='flex w-full flex-col'>
                                <div class='w-full my-2'>
                                    <label for='name'>Nombre</label>
                                    <input
                                        v-model='form.name' type='text' placeholder='Escribe el nombre del producto'
                                        class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                    <span v-if='form.errors.name'
                                          class='text-red-500 font-bold py-2 block'
                                    >{{ form.errors.name }}</span>
                                </div>
                                <div class='w-full my-2'>
                                    <label for='price'>Precio</label>
                                    <input
                                        v-model='form.price'
                                        type='number' min='0'
                                        class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                </div>
                                <div class='w-full my-2'>
                                    <label for='quantity'>Cantidad</label>
                                    <input
                                        v-model='form.quantity'
                                        type='number' min='0'
                                        class='w-full border-2 border-gray-200 mt-2 rounded-md'>
                                </div>
                                <div class='w-full my-2'>
                                    <label for='is_active'>¿ Activo ?</label>
                                    <select name='is_active' v-model='form.is_active'
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
                                <progress v-if='form.progress' :value='form.progress.percentage' max='100'>
                                    {{ form.progress.percentage }}%
                                </progress>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head, useForm } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
    name: 'Create',
    components: {
        Head
    },
    layout: Layout,
    setup() {
        const form = useForm({
            name: null,
            price: null,
            quantity: null,
            is_active: 1
        });
        return { form };
    }
};
</script>

<style scoped>

</style>

