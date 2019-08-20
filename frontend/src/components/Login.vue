<template>
    <div class="card col-md-6 offset-3">
        <div class="card-header">
            Admin panel authentication
        </div>
        <div class="card-body">
            <form @submit.prevent="submit()">
                <div class="form-group">
                    <input class="form-control" placeholder="login" v-model="user.login"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="password" v-model="user.password"/>
                </div>
                <button class="btn btn-dark" type="submit">Log in</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data() {
            return {
                user: {
                    login: null,
                    password: null
                }
            }
        },

        methods: {
            submit() {
                this.$store.dispatch('login', this.user)
                    .then(response => {
                        console.log('returned from vuex')
                        this.$router.push('/')
                    })
                    .catch(error => console.log(error.response))
            }
        }
    }
</script>

<style scoped>

</style>