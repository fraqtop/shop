import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
import config from '../config'

Vue.use(Vuex)


let store = new Vuex.Store({
    state: {
        token: null
    },

    getters: {
        isLoggedIn: state => !!state.token,
        bearerString: state => `Bearer ${state.token}`
    },

    mutations: {
        setToken (state, value) {
            state.token = value
        },
    },

    actions: {
        async login(context, user) {
            let data = new FormData();
            data.set('username', user.login);
            data.set('password', user.password);
            return await axios.post(`${config.getDomain()}/users/login`, data)
                .then(response => {
                    this.commit('setToken', response.data.access_token)
                    axios.defaults.headers.common['Authorization'] = this.getters.bearerString
                    resolve(response)
                })
                .catch(error => {
                    console.log(error.response)
                });
        }
    }
})

export default store