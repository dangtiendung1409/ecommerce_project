
<template>
    <!-- preloader  -->
<!--    <div id="preloader">-->
<!--        <div id="ctn-preloader" class="ctn-preloader">-->
<!--            <div class="animation-preloader">-->
<!--                <div class="spinner"></div>-->
<!--            </div>-->
<!--            <div class="loader">-->
<!--                <div class="row">-->
<!--                    <div class="col-3 loader-section section-left">-->
<!--                        <div class="bg"></div>-->
<!--                    </div>-->
<!--                    <div class="col-3 loader-section section-left">-->
<!--                        <div class="bg"></div>-->
<!--                    </div>-->
<!--                    <div class="col-3 loader-section section-right">-->
<!--                        <div class="bg"></div>-->
<!--                    </div>-->
<!--                    <div class="col-3 loader-section section-right">-->
<!--                        <div class="bg"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <!-- preloader end -->


    <!-- Scroll-top -->
    <button class="scroll-top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->

    <!-- header-area -->
    <header class="header-style-two">
        <div id="sticky-header" class="main-header transparent-header menu-area">
            <div class="container custom-container-two">
                <div class="row">
                    <div class="col-12">
                        <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
                        <div class="menu-wrap">
                            <nav class="menu-nav show">
                                <div class="logo">
                                    <router-link :to="'/'" href="index.html" class="main-logo"><img src="/front_assets/img/logo/fw_logo.png" alt="Logo"></router-link>
                                    <router-link :to="'/'" class="sticky-logo"><img src="/front_assets/img/logo/logo.png" alt="Logo"></router-link>
                                </div>
                                <div class="navbar-wrap main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children has--mega--menu"><a href="#">Home</a>
                                            <ul class="mega--menu--wrap scroll">
                                                <li>
                                                    <a href="index.html">
                                                        <span class="img"><img src="/front_assets/img/home-demo/home_01.jpg" alt=""></span>
                                                        <span class="text">Home style One</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li v-for="item in headerCategories" :key="item.id" class="has--mega--menu">
                                            <router-link :to="'/category/'+item.slug">{{ item.name }}</router-link>
                                            <ul class="mega-menu">
                                                <li class="mega-menu-wrap">
                                                    <ul class="mega-menu-col">
                                                        <li class="mega-title"><a href="shop.html">{{ item.name }}</a></li>
                                                        <li v-for="subitem in item.subcategories" :key="subitem.id">
                                                            <router-link :to="'/category/'+subitem.slug">{{ subitem.name }}</router-link>
                                                        </li>
                                                    </ul>

                                                    <ul class="mega-menu-col sub-cat-post">
                                                        <li>
                                                            <a href="shop-sidebar.html">
                                                                <img :src="`/images/categories/${item.image}`" alt="">
                                                                <span class="btn">{{ item.name }}</span>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>

                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="header-action d-none d-md-block">
                                    <ul>
                                        <li class="header-search"><a href="#" data-toggle="modal" data-target="#search-modal"><i class="flaticon-search"></i></a></li>
                                        <li class="header-shop-cart"><a href="#"><i class="flaticon-shopping-bag"></i><span>{{cartCount}}</span></a>
                                            <ul class="minicart">
                                                <li v-if="cartCount > 0" v-for="item in cartProduct" :key="item.id" class="d-flex align-items-start">
                                                    <div class="cart-img">
                                                        <a href="#"><img :src="`/images/products/${item.products[0].image}`" alt=""></a>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h4><a href="#">{{item.products[0].name}}</a></h4>
                                                        <div class="cart-price">
                                                            <span class="new">${{item.products[0].product_attributes[0].price}}</span>
                                                            <span><del>${{item.products[0].product_attributes[0].mrp}}</del></span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon">
                                                        <a href="javascript:void(0)" @click="removeCartData(item.products[0].id,item.products[0].product_attributes[0].id,1)"><i class="far fa-trash-alt"></i></a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="total-price">
                                                        <span class="f-left">Total:</span>
                                                        <span class="f-right">${{cartTotal}}</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkout-link">
                                                        <a href="#">Shopping Cart</a>
                                                        <a class="black-color" href="#">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="header-profile"><a href="#"><i class="flaticon-user-profile"></i></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="mobile-menu">
                            <div class="close-btn"><i class="flaticon-targeting-cross"></i></div>
                            <nav class="menu-box">
                                <div class="nav-logo"><a href="index.html"><img src="/front_assets/img/logo/logo.png" alt="" title=""></a>
                                </div>
                                <div class="menu-outer">
                                    <ul class="navigation">
                                        <li class="active menu-item-has-children"><a href="#">Home</a>
                                            <ul class="submenu">
                                                <li><a href="index.html">Home One</a></li>
                                                <li><a href="index-2.html">Home Two</a></li>
                                                <li class="active"><a href="index-3.html">Home Three</a></li>
                                                <li><a href="index-4.html">Home Four</a></li>
                                                <li><a href="index-5.html">Home Five</a></li>
                                                <li><a href="index-6.html">Home Six</a></li>
                                                <li><a href="index-7.html">Home Seven</a></li>
                                                <li><a href="index-8.html">Home Eight</a></li>
                                                <li><a href="index-9.html">Home Nine</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop</a>
                                            <ul class="submenu">
                                                <li><a href="shop.html">Shop Page</a></li>
                                                <li><a href="shop-sidebar.html">Shop Sidebar</a></li>
                                                <li><a href="shop-details.html">Shop Details</a></li>
                                                <li><a href="cart.html">Cart Page</a></li>
                                                <li><a href="cart.html">Checkout Page</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li class="menu-item-has-children"><a href="#">blog</a>
                                            <ul class="submenu">
                                                <li><a href="blog.html">Our Blog</a></li>
                                                <li><a href="blog-details.html">Blog Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="clearfix">
                                        <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                        <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                        <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                        <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Search -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Search here...">
                        <button><i class="flaticon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Search-end -->

        <!-- off-canvas-start -->
        <div class="sidebar-toggle-btn"><a href="#" class="navSidebar-button"><img src="/front_assets/img/icon/sidebar_toggle_icon.png" alt=""></a></div>
        <div class="sidebar-off-canvas info-group">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-widget scroll">
                <div class="sidebar-widget-container">
                    <div class="off-canvas-heading">
                        <a href="#" class="close-side-widget">
                            <span class="flaticon-targeting-cross"></span>
                        </a>
                    </div>
                    <div class="sidebar-textwidget">
                        <div class="sidebar-info-contents">
                            <div class="content-inner">
                                <div class="logo mb-30">
                                    <a href="index.html"><img src="/front_assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <div class="content-box">
                                    <p>WooCommerce and WordPress are both free, open source software reasons many ...</p>
                                </div>
                                <div class="contact-info">
                                    <h4 class="title">CONTACT US</h4>
                                    <ul>
                                        <li><span class="flaticon-phone-call"></span><a href="tel:123456789">+9 325 444 0000</a></li>
                                        <li><span class="flaticon-email"></span><a href="mailto:adara@info.com">adara@info.com</a></li>
                                        <li><span class="flaticon-place"></span>71 Park Lan Street 2355 NY</li>
                                    </ul>
                                </div>
                                <div class="oc-newsletter">
                                    <h4 class="title">NEWSLETTER</h4>
                                    <p>Fill your email below to subscribe to my newsletter</p>
                                    <form action="#">
                                        <input type="email" placeholder="Email...">
                                        <button class="btn">Subscribe</button>
                                    </form>
                                </div>
                                <div class="oc-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                                <div class="oc-bottom">
                                    <div class="currency">
                                        <form action="#">
                                            <label>Currency</label>
                                            <select name="select">
                                                <option value="">USD</option>
                                                <option value="">AUE</option>
                                                <option value="">SAR</option>
                                                <option value="">INR</option>
                                                <option value="">BDT</option>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="language">
                                        <form action="#">
                                            <label>Language</label>
                                            <select name="select">
                                                <option value="">English</option>
                                                <option value="">Spanish</option>
                                                <option value="">Turkish</option>
                                                <option value="">Russian</option>
                                                <option value="">Chinese</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- off-canvas-end -->

    </header>
    <!-- main-area -->
    <main>
        <slot name="content" :addToCart="addToCart">

        </slot>
    </main>
    <!-- header-area-end -->

    <!-- footer-area -->
    <footer class="dark-bg pt-55 pb-80">
        <div class="container">
            <div class="footer-top-wrap">
                <div class="row">
                    <div class="col-12">3
                        <div class="footer-logo">
                            <a href="index.html"><img src="/front_assets/img/logo/w_logo.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-middle-wrap">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-link-wrap">
                            <nav class="menu-links">
                                <ul>
                                    <li><a href="about-us.html">About us</a></li>
                                    <li><a href="shop-sidebar.html">Store</a></li>
                                    <li><a href="contact.html">Locations</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Support</a></li>
                                    <li><a href="#">Policy</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </nav>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright-text">
                            <p>&copy; 2021 <a href="index.html">adara</a>. All Rights Reserved | Ph (+09) 456 457869</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pay-method-img">
                            <img src="/front_assets/img/images/payment_method_img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-area-end -->
<div id="scripts"></div>
</template>
<script>
import axios from 'axios';
import getUrlList from "../provider.js";
 export default {
     name:'Layout',
     data(){
         return{
             headerCategories:[],
             user_info:{
                 'user_id':'',
                 'auth':false
             },
             cartCount:0,
             cartProduct:[],
             cartTotal:0
         }
     },
     watch: {
         cartProduct(val) {
             this.cartTotal = 0;
             for (var item in val) {
                 this.cartTotal += val[item].qty * val[item].products[0].product_attributes[0].price;
             }
         }
     },

     mounted(){
         var src = ['/front_assets/js/vendor/jquery-3.5.0.min.js','/front_assets/js/popper.min.js',
             '/front_assets/js/bootstrap.min.js', '/front_assets/js/isotope.pkgd.min.js',
             '/front_assets/js/imagesloaded.pkgd.min.js', '/front_assets/js/jquery.magnific-popup.min.js',
             '/front_assets/js/jquery.mCustomScrollbar.concat.min.js', '/front_assets/js/bootstrap-datepicker.min.js',
             '/front_assets/js/jquery.nice-select.min.js', '/front_assets/js/jquery.countdown.min.js',
             '/front_assets/js/swiper-bundle.min.js','/front_assets/js/jarallax.min.js',
             '/front_assets/js/slick.min.js', '/front_assets/js/wow.min.js',
             '/front_assets/js/nav-tool.js', '/front_assets/js/plugins.js','/front_assets/js/main.js',
         ];
         for (var i=0; i<src.length;i++){
             const script = document.createElement('script');
             script.src = src[i];
             script.async =false;
             document.getElementById('scripts').appendChild(script);
         }
         this.getCategories();
         this.getUser();
         this.getCartData();
     },
     methods:{
         async removeCartData(product_id,product_attr_id,qty){
             try {
                 let data = await axios.post(getUrlList().removeCartData, {
                     'token': this.user_info.user_id,
                     'auth': this.user_info.auth,
                     'product_id':product_id,
                     'product_attr_id':product_attr_id,
                     'qty':qty,
                 });
                 if (data.status === 200) {
                     this.getCartData();
                 } else {
                     console.log('Data not found');
                 }
             } catch (error) {
                 console.log('Error in getUserData:', error);
             }
         },
         async addToCart(product_id, product_attr_id, qty) {
             if(product_id == '' || product_attr_id == '' || qty =='' || qty<1){
                 alert('Select Color or qty');
             }else{
                 try {
                     // Kiểm tra nếu sản phẩm đã có trong giỏ hàng hay chưa
                     let existingProduct = this.cartProduct.find(item =>
                         item.product_id === product_id && item.product_attr_id === product_attr_id
                     );

                     if (existingProduct) {
                         // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
                         existingProduct.qty += qty;
                         await this.updateCartData(product_id, product_attr_id, existingProduct.qty);
                     } else {
                         // Nếu sản phẩm chưa có trong giỏ hàng, thêm sản phẩm mới
                         let data = await axios.post(getUrlList().addToCart, {
                             'token': this.user_info.user_id,
                             'auth': this.user_info.auth,
                             'product_id': product_id,
                             'product_attr_id': product_attr_id,
                             'qty': qty,
                         });
                         if (data.status === 200) {
                             this.getCartData();
                         } else {
                             console.log('Data not found');
                         }
                     }
                 } catch (error) {
                     console.log('Error in addToCart:', error);
                 }
             }

         },
         async updateCartData(product_id, product_attr_id, qty) {
             try {
                 let data = await axios.post(getUrlList().updateCartData, {
                     'token': this.user_info.user_id,
                     'auth': this.user_info.auth,
                     'product_id': product_id,
                     'product_attr_id': product_attr_id,
                     'qty': qty,
                 });
                 if (data.status === 200) {
                     this.getCartData(); // Lấy lại dữ liệu giỏ hàng sau khi cập nhật
                 } else {
                     console.log('Data not found');
                 }
             } catch (error) {
                 console.log('Error in updateCartData:', error);
             }
         },

         async getCartData(){
             try {
                 let data = await axios.post(getUrlList().getCartData, {
                     'token': this.user_info.user_id,
                     'auth': this.user_info.auth,
                 });
                 if (data.status === 200) {
                     this.cartCount = data.data.data.data.length;
                     this.cartProduct = data.data.data.data;
                 } else {
                     console.log('Data not found');
                 }
             } catch (error) {
                 console.log('Error in getUserData:', error);
             }
         },
         async getUser(){
             if(localStorage.getItem('user_info')) {
                 // user set into local storage
                 var user = localStorage.getItem('user_info');
                 var testUser = JSON.parse(user);
                 this.user_info.user_id = testUser.user_id;
                 await this.getUserData();
             }else{
                 // user not set to local storage
                 console.log('No user info in localStorage');
                 await this.getUserData();
             }
         },
         async getUserData() {
             try {
                 let data = await axios.post(getUrlList().getUserData, {
                     'token': this.user_info.user_id,
                 });
                 if (data.status === 200) {
                     if (data.data.data.data.user_type == 1){
                     // Auth USer
                     this.user_info.auth = true;
                     this.user_info.user_id = data.data.data.data.token;
                     localStorage.setItem('user_info', JSON.stringify(this.user_info));
                 }else{
                         // not auth user
                         this.user_info.auth = false;
                         this.user_info.user_id = data.data.data.data.token;
                         localStorage.setItem('user_info', JSON.stringify(this.user_info));
                     }
                 } else {
                     console.log('Data not found');
                 }
             } catch (error) {
                 console.log('Error in getUserData:', error);
             }
         },

         async getCategories(){
             try {
                 let data = await axios.get(getUrlList().getHeaderCategoriesData);
                 // console.log(data.data.data.data.categories);
                 if(data.status == 200 && data.data.data.data.categories.length > 0 ) {
                     this.headerCategories = data.data.data.data.categories;
                     // console.log(this.headerCategories);
                 }else{
                     console.log('data not found');
                     // console.log(data);
                 }
             } catch (error) {
                  console.log('error');
             }
         }
     }
 }
</script>
