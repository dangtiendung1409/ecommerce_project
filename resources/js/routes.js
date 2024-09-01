import { createWebHistory, createRouter } from 'vue-router'
import test from './test.vue'
import Index from './frontTemplate/Index.vue'
import Category from './frontTemplate/Category.vue'


const routes = [

    {
        name: 'Index',
        path: '/',
        component: Index,

    },
    {
        name: 'Category',
        path: '/category/:slug?',
        component: Category,

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
