import VueRouter from 'vue-router'
// Pages
// import Home from './pages/Home'
// import Register from './pages/Register'
import Login from './pages/Login'
import Dashboard from './pages/Dashboard'
import Roles from './pages/Roles'
import Users from './pages/Users'
// Routes
const routes = [
  {
    path: '/',
    name: 'login',
    component: Login,
  },
  // DASHBOARD ROUTES
  {
    path: '/portal/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  // ROLES ROUTES
  {
    path: '/portal/roles',
    name: 'roles',
    component: Roles,
    meta: {
      auth: true
    }
  },
  // USER ROUTES
  {
    path: '/portal/users',
    name: 'users',
    component: Users,
    meta: {
      auth: true
    }
  },
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})

export default router