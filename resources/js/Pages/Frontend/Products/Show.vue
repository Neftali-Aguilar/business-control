<template>
    <Head>
        <title>Detalles del Producto {{ product.name }}</title>
        <meta name="description" content="Your page description" />
    </Head>
    <div>
        <div class="px-4 md:px-10 mx-auto w-full -m-24">
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div
                        class="relative min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0"
                    >
                        <div class="rounded-t bg-white mb-0 px-6 py-6">
                            <div
                                class="text-center flex justify-between items-center"
                            >
                                <h6 class="text-blueGray-700 text-xl">
                                    Detalles del Producto {{ product.name }}
                                </h6>
                                <button
                                    @click="deleteProduct(product)"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                >
                                    Eliminar Producto
                                </button>
                            </div>
                        </div>
                        <div class="px-4 lg:px-10 py-10 pt-0">
                            <form
                                @submit.prevent="
                                    form.put(route('products.update', product))
                                "
                                class="flex w-full flex-col"
                            >
                                <div class="w-full my-2">
                                    <label for="name">Nombre</label>
                                    <input
                                        v-model="form.name"
                                        type="text"
                                        placeholder="Escribe el nombre del producto"
                                        class="w-full border-2 border-gray-200 mt-2 rounded-md"
                                    />
                                    <span
                                        v-if="form.errors.name"
                                        class="text-red-500 font-bold py-2 block"
                                        >{{ form.errors.name }}</span
                                    >
                                </div>
                                <div class="w-full my-2">
                                    <label for="price">Precio</label>
                                    <input
                                        v-model="form.price"
                                        type="number"
                                        min="0"
                                        class="w-full border-2 border-gray-200 mt-2 rounded-md"
                                    />
                                </div>
                                <div class="w-full my-2">
                                    <label for="quantity">Cantidad</label>
                                    <input
                                        v-model="form.quantity"
                                        type="number"
                                        min="0"
                                        class="w-full border-2 border-gray-200 mt-2 rounded-md"
                                    />
                                </div>
                                <div class="w-full my-2">
                                    <label for="is_active">¿ Activo ?</label>
                                    <select
                                        name="is_active"
                                        v-model="form.is_active"
                                        class="w-full border-2 border-gray-200 mt-2 rounded-md"
                                    >
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="w-full my-5">
                                    <button
                                        class="bg-blue-500 text-white font-bold uppercase text-md px-4 py-2 rounded shadow hover:shadow-lg outline-none mr-1 ease-linear transition-all duration-150"
                                    >
                                        Guardar
                                    </button>
                                </div>
                                <progress
                                    v-if="form.progress"
                                    :value="form.progress.percentage"
                                    max="100"
                                >
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
import { Head, useForm, usePage } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';
import { watch } from 'vue';
import Swal from 'sweetalert2';
import { Inertia } from '@inertiajs/inertia';

export default {
    name: 'Create',
    components: {
        Head,
    },
    props: {
        product: Object,
    },
    layout: Layout,
    setup(props) {
        const { id, name, price, quantity, is_active } =
            usePage().props.value.product;
        const form = useForm({
            id,
            name: name,
            price: price,
            quantity: quantity,
            is_active: is_active,
        });
        const displayMessage = (message) => {
            Swal.fire({
                title: message,
                icon: 'success',
                confirmButtonText: 'Cerrar',
            });
        };

        watch(props, () => {
            const { message: flashMessage } = usePage().props.value.flash;
            if (flashMessage) displayMessage(flashMessage);
        });

        const deleteProduct = (product) => {
            Swal.fire({
                title: `¿Realmente desea eliminar el producto ${product.name}?`,
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: `Cancelar`,
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(route('products.delete', product))
                    //Swal.fire('Producto eliminado con éxito!', '', 'success');
                } else if (result.isDenied) {
                    Swal.close()
                }
            });
        };

        return { form, deleteProduct };
    },
};
</script>

<style scoped></style>
