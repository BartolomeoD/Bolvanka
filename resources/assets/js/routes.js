import VueRouter from 'vue-router'

const routes = [
    {
        path: '/login',
        component: require('./components/auth/login'),
        name: 'login'
    }
];

export default new VueRouter({
    mode: 'history',
    routes
});