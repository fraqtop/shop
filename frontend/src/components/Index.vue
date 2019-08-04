<template>
    <div class="container">
        <h1>hello, this is list of manufacturers we work with.</h1>
        <router-link
                v-for="manufacturer in manufacturers"
                v-bind:key="manufacturer.id"
                :to="{name: 'products', params: {id: manufacturer.id}}"
        >
            {{manufacturer.name}} from {{manufacturer.country}}
        </router-link>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: "Index",
    data: function () {
        return {
            manufacturers: null
        }
    },
    created: function () {
        this.getManufacturers()
    },
    methods:{
        getManufacturers() {
            axios('http://localhost:8000/manufacturers')
                .then(response => {
                    this.manufacturers = response.data
                })
                .catch(error => {
                    console.log(error.message)
                })
        }
    }
}
</script>

<style scoped>

</style>