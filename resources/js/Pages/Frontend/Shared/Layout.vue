<template>
    <div id='root'>
        <NavBar />
        <div class='relative md:ml-64 bg-blueGray-50'>
            <div class='relative bg-blue-500 md:pt-32 pb-10 pt-12'>
                <div class='px-4 md:px-10 mx-auto w-full'>
                </div>
            </div>

            <slot />

        </div>
    </div>
</template>

<script>
import NavBar from './NavBar';
export default {
    name: 'Layout',
    components:{
        NavBar
    }
};
</script>

<style scoped>

</style>
