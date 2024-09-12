<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\Size;
use App\Models\TempUsers;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Validator;

class HomePageController extends Controller
{
    use ApiResponse;
    public function getHomeData(){
        $data = [];
        $data['banner'] = HomeBanner::get();
        $data['categories'] = Category::with('products')->get();
        $data['brands'] = Brand::get();
        $data['products'] = Product::with('productAttributes')->get();
        return $this->success(['data' => $data], 'Successfully data fetched');
    }
    public function getCategoriesData(){
        $data['categories'] = Category::with('subcategories')->where('parent_category_id',Null)->get();
        return $this->success(['data' => $data], 'Successfully data fetched');
    }
    public function getCategoryData(Request $request){
        $attribute = $request->attribute;
        $brand = $request->brand;
        $color = $request->color;
        $size = $request->size;
        $lowPrice = $request->lowPrice;
        $highPrice = $request->highPrice;
        $slug = $request->slug;
        $category = Category::where('slug',$slug)->first();
        if(isset($category->id)){
//            $products = Product::where('category_id',$category->id)
//                ->with('productAttributes')
//                ->select('id','name','slug','image','item_code')
//                ->paginate(10);
            $products = $this->getFilterProducts($category->id,$size,$brand,$color,$attribute,$lowPrice,$highPrice);
            if($category->parent_category_id == Null || $category->parent_category_id == '' ) {
                // parent cat
                $categories = Category::where('parent_category_id',$category->id)->get();
            }else{
                // child cat
                $categories = Category::where('parent_category_id',$category->parent_category_id)->where('id','!=',$category->id)->get();
            }

        }else{
            $category = Category::first();
            $products = Product::where('category_id',$category->id)
                ->with('productAttributes')
                ->select('id','name','slug','image','item_code')
                ->paginate(10);

            if($category->parent_category_id == Null || $category->parent_category_id == '' ) {
                // parent cat
                $categories = Category::where('parent_category_id',$category->id)->get();
            }else{
                // child cat
                $categories = Category::where('parent_category_id',$category->parent_category_id)->where('id','!=',$category->id)->get();
            }
        }
        $lowPrice = ProductAttr::orderBy('price','asc')->pluck('price')->first();
        $highPrice = ProductAttr::orderBy('price','desc')->pluck('price')->first();
        $brands = Brand::get();
        $sizes = Size::get();
        $colors = Color::get();
        $attributes = CategoryAttribute::where('category_id',$category->id)->with('attribute')->get();
        return $this->success(['data' => get_defined_vars()], 'Successfully data fetched');
    }
    function getFilterProducts($category_id,$size,$brand,$color,$attribute,$lowPrice,$highPrice)
    {
        $products = Product::where('category_id',$category_id);

        if(sizeof($brand) > 0 ) {
            $products = $products->whereIn('brand_id',$brand);
        }
        if(sizeof($attribute) > 0 ) {
            $products = $products->withWhereHas('attribute',function ($q) use ($attribute){
                $q->whereIn('attribute_value_id',$attribute);
            });
        }
        if(sizeof($size) > 0 ) {
            $products = $products->withWhereHas('productAttributes',function ($q) use ($size){
                $q->whereIn('size_id',$size);
            });
        }
        if(sizeof($color) > 0 ) {
            $products = $products->withWhereHas('productAttributes',function ($q) use ($color){
                $q->whereIn('color_id',$color);
            });
        }
        if($lowPrice !='' && $lowPrice != null && $highPrice!=''){
            $products = $products->withWhereHas('productAttributes',function ($q) use ($lowPrice , $highPrice){
               $q->whereBetween('price',[$lowPrice , $highPrice]);
            });
        }
        $products = $products->with('productAttributes')->select('id','name','slug','image','item_code')->paginate(10);
        return $products;
    }
    function getUserData(Request $request){
//        prx($request->all());
        $token = $request->token;
        $checkUser = TempUsers::where('token',$token)->first();

        if(isset($checkUser->id)){
            // token exist in db
            $data['user_type'] = $checkUser->user_type;
            $data['token'] = $checkUser->token;
            if(checkTokenExpiryInMinutes($checkUser->updated_at,60)){
              // token has expire
               $token = generateRandomString();
               $checkUser->token = $token;
               $checkUser->updated_at = date('y-m-d h:i:s a',time());
               $checkUser->save();

               $data['token'] = $token;
            }else{
               //token not expire
            }
        }else{
            // token not exist in db
            $user_id = rand(11111,99999);
            $token = generateRandomString();
            $time = date('y-m-d h:i:s a',time());
            TempUsers::create(['user_id'=>$user_id, 'token'=>$token,'created_at'=>$time,'updated_at'=>$time]);
            $data['user_type'] = 2;
            $data['token'] = $token;
        }
        return $this->success(['data' => $data], 'Successfully data fetched');
    }
    public function getCartData(Request $request){
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:temp_users,token',

        ]);
        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
        }else{
            $userToken = TempUsers::where('token',$request->token)->first();
            $data = Cart::where('user_id',$userToken->user_id)->with('products')->get();
            return $this->success(['data' => $data], 'Successfully data fetched');
        }
    }

//    public function changeSlug(){
//        $data = Product::get();
//        foreach ($data as $list){
//            $result = Product::find($list->id);
//            $result->slug = replaceStr($result->name);
//            $result->save();
//        }
//    }
}
