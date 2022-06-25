<template>
    <Head>
        <title>Producto {{ product.name }}</title>
        <meta name="description" content="Your page description">
    </Head>
    <div>
        <div class='px-4 md:px-10 mx-auto w-full -m-24'>
            <div class='flex flex-wrap'>
                <div class='w-full px-4'>
                    <div
                        class='relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white border-0'>
                        <div class='rounded-t bg-white mb-0 px-6 py-6'>
                            <div class='text-center flex justify-between items-center'>
                                <h6 class='text-blueGray-700 text-xl'>
                                    Detalles del producto <span class='font-bold'>{{ product.name }}</span>
                                </h6>
                            </div>
                        </div>
                        <div class='flex-auto px-4 lg:px-10 py-10 pt-0'>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Head } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
    name: 'Show',
    components:{
        Head,
    },
    layout: Layout,
    props:{
        product: Object
    }
};
</script>

<style scoped>

</style>

