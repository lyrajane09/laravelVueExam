import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './Index'
import SidebarComponent from './components/SidebarComponent'
import MainContent from './MainContent'
import CreateRoleModal from './pages/modal/CreateRoleModal'
import CreateUserModal from './pages/modal/CreateUserModal'
import auth from './auth'
import router from './router'
import CONFIG from './config'

// Set Vue globally
window.Vue = Vue
// Set Vue router

Vue.router = router
Vue.use(VueRouter)

// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api`
Vue.use(VueAuth, auth)

// Load Index
Vue.component('index', Index)
Vue.component('sidebar-component', SidebarComponent)
Vue.component('main-content', MainContent)
Vue.component('create-role-modal', CreateRoleModal)
Vue.component('create-user-modal', CreateUserModal)
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
const app = new Vue({
  el: '#app',
  router
})
