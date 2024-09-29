<template>
    <Layout>
        <template v-slot:content>
            <main>

                <!-- breadcrumb-area -->
                <section class="breadcrumb-area breadcrumb-bg" data-background="/front_assets/img/bg/breadcrumb_bg01.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-content">
                                    <h2>Shop Sidebar</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Shop</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- breadcrumb-area-end -->

                <!-- shop-area -->
                <section class="shop-area pt-100 pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-9 col-lg-8">
                                <div class="shop-top-meta mb-35">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="shop-top-left">
                                                <ul>
                                                    <li><a href="#"><i class="flaticon-menu"></i> FILTER</a></li>
                                                    <li>Showing 1–9 of 80 results</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="shop-top-right">
                                                <form action="#">
                                                    <select name="select">
                                                        <option value="">Sort by newness</option>
                                                        <option>Free Shipping</option>
                                                        <option>Best Match</option>
                                                        <option>Newest Item</option>
                                                        <option>Size A - Z</option>
                                                    </select>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div v-for="item in products" :key="item.id" class="col-xl-4 col-sm-6">
                                        <div class="new-arrival-item text-center mb-50">
                                            <div class="thumb mb-25">
                                                <router-link :to="'/product/' + item.item_code + '/'+item.slug"><img :src="`/images/products/${item.image}`" alt=""></router-link>
                                                <div class="product-overlay-action">
                                                    <ul>
                                                        <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                        <li><a href="shop-details.html"><i class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div v-if="item.product_attributes && item.product_attributes.length > 0" class="content">
                                                <h5><router-link :to="'/product/' + item.item_code + '/'+item.slug">{{ item.name }}</router-link></h5>
                                                <span class="price">${{ item.product_attributes[0].price }}</span>
                                            </div>
                                            <div v-else class="content">
                                                <h5><a href="shop-details.html">{{ item.name }}</a></h5>
                                                <span class="price">Price not available</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="pagination-wrap">
                                    <ul>
                                        <li class="prev"><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">10</a></li>
                                        <li class="next"><a href="#">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4">
                                <aside class="shop-sidebar">
                                    <div class="widget side-search-bar">
                                        <form action="#">
                                            <input type="text">
                                            <button><i class="flaticon-search"></i></button>
                                        </form>
                                    </div>
                                    <div class="widget">
                                        <h4 class="widget-title">Product Categories</h4>
                                        <div class="shop-cat-list">
                                            <ul>
                                                <li v-for="item in categories" :key="item.id">
                                                    <router-link :to="'/category/'+item.slug">{{ item.name }}</router-link><span>(6)</span></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h4 class="widget-title">Price Filter</h4>
                                        <div class="price_filter">
                                            <div id="slider-range"></div>
                                            <div class="price_slider_amount">
                                                <span>Price :</span>
                                                <input type="text" id="lowPrice" @keypress="isNumber($event)" ref="lowPrice"  placeholder="Add Your Price" />
                                                <input type="text" id="highPrice" @keypress="isNumber($event)" ref="highPrice"   placeholder="Add Your Price" />
                                            </div>
                                        </div>
                                    </div>
                                    <div v-for="item in attributes" :key="item.id" class="widget">
                                        <h4 class="widget-title">{{ item.attribute.name }}</h4>
                                        <div class="sidebar-brand-list">
                                            <ul>
                                                <li v-for="attrItem in item.attribute.values" :key="attrItem.id" v-on:click="addDataAttr('attribute',attrItem.id)">
                                                    <a :class="this.attribute.includes(attrItem.id) ?brandColor : ''" href="javascript:void(0)">{{ attrItem.value }}
                                                        <i class="fas fa-angle-double-right"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h4 class="widget-title">Product Brand</h4>
                                        <div class="sidebar-brand-list">
                                            <ul>
                                                <li v-for="item in brands" :key="item.id" v-on:click="addDataAttr('brand',item.id)">
                                                    <a :class="this.brand.includes(item.id) ?brandColor : ''" href="javascript:void(0)">{{ item.text }}
                                                        <i class="fas fa-angle-double-right"></i></a></li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="widget has-border">
                                        <div class="sidebar-product-size mb-30">
                                            <h4 class="widget-title">Product Size</h4>
                                            <div class="shop-size-list">
                                                <ul>
                                                    <li v-for="item in sizes" :key="item.id" v-on:click="addDataAttr('size',item.id)">
                                                        <a :class="this.size.includes(item.id) ?sizeColor : ''" href="javascript:void(0)">
                                                        {{item.text}}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="sidebar-product-color">
                                            <h4 class="widget-title">Color</h4>
                                            <div class="shop-color-list">
                                                <ul>
                                                    <li v-for="item in colors" :key="item.id" v-on:click="addDataAttr('color',item.id)"
                                                        :class="this.color.includes(item.id) ?colorColor : ''" :style="{backgroundColor: item.value}"></li>

                                                </ul>
                                            </div>
                                        </div>
                                        <div class="cart-coupon">
                                            <form action="#">
                                                <input type="text">
                                                <button type="button" v-on:click="getProducts" class="btn">Filter</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h4 class="widget-title">Top Items</h4>
                                        <div class="sidebar-product-list">
                                            <ul>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="#"><img src="img/product/sidebar_product01.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="#">Woman T-shirt</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="#"><img src="img/product/sidebar_product02.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="#">Slim Fit Cotton</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="sidebar-product-thumb">
                                                        <a href="#"><img src="img/product/sidebar_product03.jpg" alt=""></a>
                                                    </div>
                                                    <div class="sidebar-product-content">
                                                        <div class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                        <h5><a href="#">Fashion T-shirt</a></h5>
                                                        <span>$ 39.00</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>

                </section>
                <!-- shop-area-end -->

            </main>
        </template>
    </Layout>
</template>

<script>
import Layout from './Layout.vue'
import axios from 'axios';
import getUrlList from "../provider.js";
import { useRoute } from 'vue-router';
export default {
    name: 'Category',
    components:{
        Layout
    },
    data(){
        return{
            categories:[],
            products:[],
            brands:[],
            sizes:[],
            colors:[],
            attributes:[],
            category:'',
            highPrice:'',
            lowPrice:'',
            slug:'',
            priceRange:'',
            brand:[],
            size:[],
            color:[],
            attribute:[],
            brandColor: 'brandColor',
            sizeColor: 'sizeColor',
            colorColor: 'colorColor'
        }
    },
    watch:{
        '$route'()
        {
            this.getProducts();
        }
    },
    mounted() {
        console.log('index file call');
        this.getProducts();
    },
    methods:{
        // showDataAttribute(){
        //     this.getProducts();
        // },
        isNumber(evt) {
            const charcode = evt.which ? evt.which : evt.keyCode;  // Lấy mã phím vừa nhấn.

            // Kiểm tra xem mã phím có phải là số từ 0-9 hoặc dấu chấm thập phân không.
            if (charcode > 31 && (charcode < 48 || charcode > 57) && charcode !== 46) {
                evt.preventDefault();  // Ngăn chặn việc nhập nếu không phải là số hoặc dấu chấm.
            }
        },
        addDataAttr(type,value)
        {
          if(type == 'brand'){

              if(this.checkArray(type,value)){
                  // true value exist in array
                  this.brand.splice(this.brand.indexOf(value),1)
              }else{
                // false value not exist in array
                  this.brand.push(value)
              }
              console.log(this.brand);
          }else if(type == 'size'){
              if(this.checkArray(type,value)){
                  // true value exist in array
                  this.size.splice(this.size.indexOf(value),1)
              }else{
                  // false value not exist in array
                  this.size.push(value)
              }

          }else if(type == 'color'){
              if(this.checkArray(type,value)){
                  // true value exist in array
                  this.color.splice(this.color.indexOf(value),1)
              }else{
                  // false value not exist in array
                  this.color.push(value)
              }
          }else if(type == 'attribute'){
              if(this.checkArray(type,value)){
                  // true value exist in array
                  this.attribute.splice(this.attribute.indexOf(value),1)
              }else{
                  // false value not exist in array
                  this.attribute.push(value)
              }
          }
        },
        checkArray(type,value)
        {
            if(type == 'brand'){
                return this.brand.includes(value);
            }else if (type == 'size'){
                return this.size.includes(value);
            }else if (type == 'color'){
                return this.color.includes(value);
            }else if (type == 'attribute'){
                return this.attribute.includes(value);
            }
        },
        async getProducts() {
            try {
                const route = useRoute();
                this.slug = this.$route.params.slug;
                console.log(this.slug);
                if(this.slug == '' || this.slug == undefined || this.slug == null) {
                    this.$router.push({name:'Index'});
                }else{
                    let data = await axios.post(getUrlList().getCategoryData,{
                        "slug":this.slug,
                        "attribute":this.attribute,
                        "lowPrice":this.$refs.lowPrice.value,
                        "highPrice":this.$refs.highPrice.value,
                        "brand":this.brand,
                        "size":this.size,
                        "color":this.color,
                    });
                    // console.log(data)
                    console.log(data.data.data.data.products.data);
                    if (data.status == 200 && data.data.data.data.products.data.length > 0) {
                        this.categories = data.data.data.data.categories;
                        this.products = data.data.data.data.products.data;
                        this.brands = data.data.data.data.brands;
                        this.sizes = data.data.data.data.sizes;
                        this.colors = data.data.data.data.colors;
                        this.attributes = data.data.data.data.attributes;
                        this.$refs.lowPrice.value = data.data.data.data.lowPrice;
                        this.$refs.highPrice.value = data.data.data.data.highPrice;
                        // console.log(this.headerCategories);
                    } else {
                        console.log('data not found');
                        // console.log(data);
                    }
                }

            } catch (error) {
                console.log('error');
            }
        }
    }

}
</script>
<style>
.brandColor::before {
    background-color: #ff5400;
}
.sizeColor {
    background-color: #ff5400;
    color: #FFFF;
}
.colorColor::before {
    content: '\2713';
    display: inline-block;
    color: #fff;
    padding: 0 6px 0 0;
}
</style>

