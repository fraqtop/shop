<template>
    <div class="container">
        <h1>Page of products from company with id {{ id }}</h1>
        <router-link
                :to="{name: 'index'}"
        >
            go back
        </router-link>
    </div>
</template>

<script>
    export default {
        name: "Products",
        props: ['id']
    }
</script>

<style scoped>

</style>