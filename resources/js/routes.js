import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'


const routes = [

    {
        name: 'test',
        path: '/',
        component: test,

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
