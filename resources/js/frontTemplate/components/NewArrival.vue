
<template>
    <section class="new-arrival-area pt-95 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-45">
                        <h3 class="title">New Arrival Collection</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="new-arrival-nav mb-35">
                        <button v-for="(catItem, index) in categories" :key="catItem.id" :class="''+showActiveClass(1, index)"
                                :data-filter="'.cat-'+catItem.id">{{ catItem.name }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <div v-for="item in products" :class="'col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-'+item.category_id">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <router-link :to="'/product/' + item.item_code + '/'+item.slug"><img :src="`/images/products/${item.image}`" alt=""></router-link>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                    <li><a href="javascript:void(0)" @click="addToCart(item.id,item.product_attributes[0].id,1)"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><router-link :to="'/product/' + item.item_code + '/'+item.slug">{{ item.name }}</router-link></h5>
                            <span class="price">
                {{ item.product_attributes && item.product_attributes.length > 0 ? item.product_attributes[0].price : 'N/A' }}$
              </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'NewArrival',
    props: {
        categories: [],
        products: [],
        showActiveClass:Function,
        addToCart:Function
    },
}
</script>

