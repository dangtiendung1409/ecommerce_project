
<template>
    <Layout>
        <template v-slot:content="slotProps">
            <!-- main-area -->
            <main>

                <!-- breadcrumb-area -->
                <section class="breadcrumb-area breadcrumb-bg" data-background="img/bg/breadcrumb_bg03.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="breadcrumb-content">
                                    <h2>Checkout Page</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- breadcrumb-area-end -->

                <!-- checkout-area -->
                <section class="checkout-area pt-95 pb-95">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="checkout-wrap">
                                    <div class="checkout-top">
                                        <h5 class="title">Billing details</h5>
                                        <a href="cart.html" class="back"><i class="fas fa-angle-left"></i> -- Back to Cart</a>
                                    </div>
                                    <form action="#" class="checkout-form">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label for="fName">FIRST NAME <span>*</span></label>
                                                    <input type="text" id="fName" v-model="firstName">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label for="lName">Last NAME <span>*</span></label>
                                                    <input type="text" id="lName" v-model="lastName">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label for="phone">Your PHONE <span>*</span></label>
                                                    <input type="number" id="phone" v-model.number="phone">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-grp">
                                                    <label for="email">EMAIL ADDRESS <span>*</span></label>
                                                    <input type="email" id="email" v-model="email">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-grp">
                                                    <label>COUNTRY / REGION <span>*</span></label>
                                                    <input type="text" id="lName" v-model="country">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label for="zip">Pincode<span>*</span></label>
                                                    <input type="number" id="zip" @blur="getPincodeDetails()" v-model.number="pincode">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-grp">
                                                    <label for="address">STREET ADDRESS <span>*</span></label>
                                                    <input type="text" id="address" v-model="address">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label>TOWN / CITY <span>*</span></label>
                                                    <input type="text" id="zip" v-model="city" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-grp">
                                                    <label>STATE <span>*</span></label>
                                                    <input type="text" id="zip" v-model="state" readonly>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="different-address custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="stda">
                                                    <label class="custom-control-label" for="stda">SHIP TO A DIFFERENT ADDRESS?</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-grp mb-0">
                                                    <label for="message">ORDER you have NOTES <small>(OPTIONAL)</small></label>
                                                    <textarea name="message" id="message" placeholder="About Your Special Delivery Notes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-8">
                                <aside class="checkout-sidebar">
                                    <h6 class="title">Cart Totals</h6>
                                    <div class="shop-cart-widget">
                                        <form action="#">
                                            <ul>
                                                <li class="sub-total"><span>SUBTOTAL</span> $ {{slotProps.cartTotal}}</li>
                                                <li class="sub-total"><span>Coupon</span> $ {{slotProps.couponName}}</li>
                                                <li>
                                                    <span>SHIPPING</span>
                                                    <div class="shop-check-wrap">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">FLAT RATE: $15</label>
                                                        </div>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">FREE SHIPPING</label>
                                                        </div>
                                                        <a href="#" class="calculate">Calculate shipping</a>
                                                    </div>
                                                </li>
                                                <li class="cart-total-amount"><span>TOTAL</span> <span class="amount">$ 151.00</span></li>
                                            </ul>
                                            <div class="payment-method-info">
                                                <div class="paypal-method-flex">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck5">
                                                        <label class="custom-control-label" for="customCheck5">Cash on delivery</label>
                                                        <p>Pay with cash upon delivery.</p>
                                                    </div>
                                                </div>
                                                <div class="paypal-method-flex">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                        <label class="custom-control-label" for="customCheck6">Payments on Card</label>
                                                    </div>
                                                    <div class="paypal-logo"><img src="img/images/card.png" alt=""></div>
                                                </div>
                                            </div>
                                            <div class="payment-terms">
                                                <p>The purpose Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                                                    dolore</p>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">I have read and agree to the website terms and conditions</label>
                                                </div>
                                            </div>
                                            <button class="btn" @click="placeOrder()">Place order</button>
                                        </form>
                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- checkout-area-end -->

            </main>
            <!-- main-area-end -->
        </template>
    </Layout>
</template>
<script>
import Layout from './Layout.vue'
import axios from 'axios';
import getUrlList from "../provider.js";
import { useRoute } from 'vue-router';
export default {
    name: 'Checkout',
    components:{
        Layout
    },
    data() {
        return {
            token:false,
            user_info:{
                'user_id':'',
                'auth':false
            },
            firstName: '',
            lastName: '',
            address : '',
            country: 'VIETNAM',
            city:'',
            state: '',
            pincode: '',
            phone: '',
            email: '',
            paymentMethod: 'COD',
        }
    },
    mounted() {
        this.getUser();
    },
    methods:{
        async placeOrder(){
            if(this.pincode!=='' && this.firstName!==''&& this.lastName!=='' && this.email!==''
                && this.address!=='' && this.country!=='' && this.city!=='' && this.state!==''
                && this.phone!==''
            ){
                try{
                    let data = await axios.post(getUrlList().placeOrder,
                        {
                            'token':this.user_info.user_id,
                            "auth":this.user_info.auth,
                            "pincode":this.pincode,
                            "firstName":this.firstName,
                            "lastName":this.lastName,
                            "email":this.email,
                            "address":this.address,
                            "country":this.country,
                            "city":this.city,
                            "stat":this.stat,
                            "phone":this.phone,
                        });
                    var result = data;
                    if(result.status == 200){
                        this.city = data.data.data.data.City;
                        this.state = data.data.data.data.State;
                    }else{
                        console.log("Rec not found");
                    }
                }catch (error){
                    alert(error.response.data.message)
                }
            }else{
                alert('All field are required')
            }
        },
        async getPincodeDetails() {
            if(this.pincode!==''){
                try{
                    let data = await axios.post(getUrlList().getPincodeDetails,
                        {
                            'token':this.user_info.user_id,
                            "auth":this.user_info.auth,
                            "pincode":this.pincode
                        });
                    var result = data;
                    if(result.status == 200){
                      this.city = data.data.data.data.City;
                      this.state = data.data.data.data.State;
                    }else{
                        console.log("Rec not found");
                    }
                }catch (error){
                   alert(error.response.data.message)
                }
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

    }
}
</script>

