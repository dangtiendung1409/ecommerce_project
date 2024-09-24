<template>
    <section class="trending-product-area trending-product-two gray-bg pt-95 pb-100">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="section-title title-style-two text-center mb-50">
                        <h3 class="title">Trending Products</h3>
                    </div>
                </div>
            </div>
            <div class="row no-gutters trending-product-grid">
                <div class="col-2">
                    <div class="trending-products-list">
                        <h5>Category</h5>
                        <ul class="nav nav-tabs" id="trendingTab" role="tablist">
                            <li v-for="(catItem, index) in categories" :key="catItem.id" class="nav-item" role="presentation">
                                <a :class="'nav-link'+ showActiveClass(1, index)" :id="'cat-tab'+catItem.id" data-toggle="tab"
                                   :href="'#cat'+catItem.id" role="tab" :aria-controls="'cat'+catItem.id" aria-selected="true">
                                    {{ catItem.name }}
                                </a>
                            </li>
                        </ul>
                        <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content tp-tab-content" id="trendingTabContent">
                        <div v-for="(catItem, index) in categories" :key="catItem.id" :class="'tab-pane '+ showActiveClass(2, index)"
                             :id="'cat'+catItem.id" role="tabpanel" :aria-labelledby="'cat-tab'+catItem.id">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img :src="`/images/categories/${catItem.image}`" height="440px" alt=""></a>
                            </div>
                            <div v-if="catItem.products.length > 0" class="row trending-product-active">
                                <div v-for="item in catItem.products" class="col">
                                    <!-- Product content -->
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img :src="`/images/products/${item.image}`" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                                            <p class="price">
                                                {{ item.product_attributes && item.product_attributes.length > 0 ? item.product_attributes[0].price : 'N/A' }}$
                                            </p>
                                        </div>
                                        <div class="features-product-cart"><a href="javascript:void(0)" @click="addToCart(item.id,item.product_attributes[0].id,1)">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'TrendingProduct',
    props: {
        categories: [],
        showActiveClass:Function,
        addToCart:Function
    },
}
</script>

