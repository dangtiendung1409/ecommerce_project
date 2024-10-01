import { createWebHistory, createRouter } from 'vue-router'
import Index from './frontTemplate/Index.vue'
import Category from './frontTemplate/Category.vue'
import Product from './frontTemplate/Product.vue'
import ShoppingCart from './frontTemplate/ShoppingCart.vue'
import Checkout from './frontTemplate/Checkout.vue'

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
    {
        name: 'Product',
        path: '/product/:item_code?/:slug?',
        component: Product,

    },
    {
        name: 'ShoppingCart',
        path: '/ShoppingCart',
        component: ShoppingCart,

    },
    {
        name: 'Checkout',
        path: '/Checkout',
        component: Checkout,

    },

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
