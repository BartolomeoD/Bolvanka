import VueRouter from 'vue-router'

const routes = [
   
    {
        path: '/backend',
        component: require('./components/auth/Login').default,
        name: 'asd'
    }
];

export default new VueRouter({
    mode: 'history',
    routes
});