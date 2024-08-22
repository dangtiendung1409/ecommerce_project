import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'
import Index from './frontTemplate/Index.vue'


const routes = [

    {
        name: 'Index',
        path: '/',
        component: Index,

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
