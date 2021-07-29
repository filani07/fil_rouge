require('./bootstrap');


import Vue from 'vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)

// Router imported
import {routes} from './routes'

//import User class
import User from './Helpres/User'
window.User = User

//import Notification class
import Notification from './Helpres/Notification'
window.Notification = Notification


const router = new VueRouter({
  routes,
  mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});
