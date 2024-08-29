
<template>
<Layout>
   <template v-slot:content>
       <!-- slider-area -->
       <section class="slider-area position-relative">
           <div class="third-slider-active">

               <div v-for="item in homeBanner" :key="item.id" class="third-slider-item third-slider-bg"  data-background="/front_assets/img/slider/third_slider_bg.jpg">
                   <div class="container custom-container-two">
                       <div class="third-slider-wrap">
                           <div class="row align-items-center">
                               <div class="col-lg-6">
                                   <div class="slider-content">
                                       <h3 class="sub-title" data-animation-in="fadeInUp" data-delay-in=".2" data-duration-in="1.5">best offer !</h3>
                                       <h2 class="title" data-animation-in="fadeInUp" data-delay-in=".4" data-duration-in="1.5">
                                           {{ item.text }}</h2>
                                       <p data-animation-in="fadeInUp" data-delay-in=".6" data-duration-in="1.5">Get up to 50% off Today Only</p>
                                       <a href="shop-sidebar.html" class="btn" data-animation-in="fadeInUp" data-delay-in=".8" data-duration-in="1.5">Shop now</a>
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="third-slider-img">
                                       <div class="img-shape" data-background="/front_assets/img/slider/third_slide_shape.png" data-animation-in="zoomIn"
                                            data-delay-in="1" data-duration-in="1.5"></div>
                                       <img :src="`/images/homeBanner/${item.image}`" style="height: 537px; width: 560px" alt="" class="main-img" data-animation-in="slideInRight2"
                                            data-delay-in="1" data-duration-in="1.5">
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>
       </section>
       <!-- slider-area-end -->



    <!-- shoes-category-area -->
    <div class="shoes-category-area pt-80 pb-30">
        <div class="container custom-container-two">
            <div class="row justify-content-center">

                <div v-for="item in getShortArray(3)" :key="item.id" class="col-lg-4 col-md-6 col-sm-9">
                    <div class="shoes-cat-item mb-50">
                        <div class="thumb mb-30">
                            <a href="shop-sidebar.html"><img :src="`/images/categories/${item.image}`" alt=""></a>
                        </div>
                        <div class="content">
                            <ul>
                                <li><a href="shop-sidebar.html">{{ item.name}}</a></li>
                                <li><span>18</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shoes-category-area-end -->

    <!-- trending-product-area -->
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

                            <li v-for="(catItem,index) in getShortArray(5)" :key="catItem.id" class="nav-item" role="presentation">
                                <a :class="'nav-link'+ showActiveClass(1, index)" :id="'cat-tab'+catItem.id" data-toggle="tab" :href="'#cat'+catItem.id"
                                   role="tab" :aria-controls="'cat'+catItem.id" aria-selected="true">
                                    {{ catItem.name }}
                                </a>
                            </li>

                        </ul>
                        <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content tp-tab-content" id="trendingTabContent">
                        <div v-for="(catItem,index) in getShortArray(5)" :key="catItem.id" :class="'tab-pane '+ showActiveClass(2, index) "
                             :id="'cat'+catItem.id" role="tabpanel" :aria-labelledby="'cat-tab'+catItem.id">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img :src="`/images/categories/${catItem.image}`" height="440px" alt=""></a>
                            </div>
                            <div v-if="catItem.products.length > 0" class="row trending-product-active">
                                <div v-for="item in catItem.products" class="col">
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
                                            <h5><a href="shop-details.html">{{item.name}}</a></h5>
                                            <p class="price">
                                                {{ item.product_attributes && item.product_attributes.length > 0 ? item.product_attributes[0].price : 'N/A' }}$
                                            </p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- trending-product-area-end -->

    <!-- new-arrival-area -->
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
                        <button v-for="(catItem,index) in getShortArray(5)" :key="catItem.id"
                                :class="''+showActiveClass(1, index)" :data-filter="'.cat-'+catItem.id">{{ catItem.name }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <div v-for="item in homeProducts" :class="'col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-'+item.category_id">
                    <div class="new-arrival-item text-center mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img :src="`/images/products/${item.image}`" alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                            <span class="price">
                               {{ item.product_attributes && item.product_attributes.length > 0 ? item.product_attributes[0].price : 'N/A' }}$
                            </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- new-arrival-area-end -->

    <!-- shoes-banner-area -->
    <section class="shoes-banner-area">
        <div class="container">
            <div class="shoes-banner-active">
                <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>9 Best <span>Shoes for</span> Standing All Day Review 2020</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>3 Best <span>Shoes for</span> Standing All Day Review 2021</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shoes-banner-bg" data-background="/front_assets/img/bg/shoes-banner_bg.jpg">
                    <div class="row">
                        <div class="col-12">
                            <div class="shoes-banner-content">
                                <h6>Athletes Shoes</h6>
                                <h2>8 Best <span>Shoes for</span> Standing All Day Review 2021</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shoes-banner-area-end -->

    <!-- promo-services -->
    <section class="promo-services pt-70 pb-25">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="/front_assets/img/icon/promo_icon01.png" alt=""></div>
                        <div class="content">
                            <h6>payment & delivery</h6>
                            <p>Delivered, when you receive arrives</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="/front_assets/img/icon/promo_icon02.png" alt=""></div>
                        <div class="content">
                            <h6>Return Product</h6>
                            <p>Retail, a Product Return Process</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="/front_assets/img/icon/promo_icon03.png" alt=""></div>
                        <div class="content">
                            <h6>money back guarantee</h6>
                            <p>Options Including 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="promo-services-item mb-40">
                        <div class="icon"><img src="/front_assets/img/icon/promo_icon04.png" alt=""></div>
                        <div class="content">
                            <h6>Quality support</h6>
                            <p>Support Options Including 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- promo-services-end -->

    <!-- instagram-post-area -->
    <div class="instagram-post-area">
        <div class="container-fluid p-0 fix">
            <div class="row no-gutters insta-active">

                <div v-for="item in homeBrands" class="col">
                    <div class="insta-post-item">
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                            <img :src="`/images/brand/${item.image}`" alt="">
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- instagram-post-area-end -->
   </template>
</Layout>
</template>
<script>
import Layout from './Layout.vue'
import axios from 'axios';
import getUrlList from "../provider.js";
export default {
    name:'Index',
    components:{
         Layout
    },
    data(){
        return{
            homeBanner:[],
            homeCategories:[],
            homeBrands:[],
            homeProducts:[],
        }
    },
    mounted() {
        console.log('index file call');
        this.getHomeBanner();
    },
    methods:{
        showActiveClass(type,index){
            // type 1 = 1 -> cat , type ==2 product
          if(type == 1 && index == 0){
              return 'active';
          }else if(type == 2 && index == 1){
              return 'show active';
          }else{
              return '';
          }
        },
        getShortArray(size){
            return this.homeCategories.slice(0,size);
        },

         async getHomeBanner() {
             try {
                 let data = await axios.get(getUrlList().getHomeData);
                 // console.log(data)
                 // console.log(data.data.data.data.categories);
                 if(data.status == 200 && data.data.data.data.banner.length > 0 ) {
                     this.homeBanner = data.data.data.data.banner;
                     this.homeCategories = data.data.data.data.categories;
                     this.homeBrands = data.data.data.data.brands;
                     this.homeProducts = data.data.data.data.products ;
                     // console.log(this.headerCategories);
                 }else{
                     console.log('data not found');
                     // console.log(data);
                 }
             } catch (error) {
                 console.log('error');
             }
             // console.log(this.homeBanner);
        }
    }
}
</script>
