export function getUrlList()
{
const baseUrl = 'http://127.0.0.1:8000/api';
      return {
          getHeaderCategoriesData : ''+baseUrl+'/getHeaderCategoriesData',
          getHomeData : ''+baseUrl+'/getHomeData',
          getCategoryData : ''+baseUrl+'/getCategoryData',
          getProductData : ''+baseUrl+'/getProductData',
          getUserData : ''+baseUrl+'/getUserData',
          getCartData : ''+baseUrl+'/getCartData',
          addToCart : ''+baseUrl+'/addToCart',
          updateCartData : ''+baseUrl+'/updateCartData',
          removeCartData : ''+baseUrl+'/removeCartData',
          addCoupon : ''+baseUrl+'/addCoupon',
          removeCoupon : ''+baseUrl+'/removeCoupon',
          getUserCoupon : ''+baseUrl+'/getUserCoupon',
          getPincodeDetails :''+baseUrl+'/getPincodeDetails',
          placeOrder:''+baseUrl+'/placeOrder',
      }
}
export default getUrlList;
