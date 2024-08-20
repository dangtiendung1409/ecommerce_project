<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttribute;
use App\Models\ProductAttrImages;
use App\Models\Size;
use App\Models\Tax;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    use ApiResponse, SaveFile;
    public function index()
    {
        $data = Product::get();
        return view('admin/Product/product', get_defined_vars());
    }

    public function view_product($id = 0)
    {
        if ($id == 0) {
            $data = new Product();
            $product_attr = new ProductAttr();
            $product_attr_image = new ProductAttrImages();
            $category = Category::get();
            $brand = Brand::get();
            $color = Color::get();
            $tax  = Tax::get();
            $size = Size::get();
        } else {
            $data['id'] = $id;
            $validation = Validator::make($data, [
                'id' => 'required|exists:products,id',
            ]);
            if ($validation->fails()) {
                return Redirect::back();
            } else {
                $data = Product::where('id', $id)->with('attribute','productAttributes')->first();
                $category = Category::get();
                $brand = Brand::get();
                $color = Color::get();
                $tax  = Tax::get();
                $size = Size::get();
            }
        }

        return view('admin/Product/manage_product', get_defined_vars());

    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Xác thực request
            $validation = Validator::make($request->all(), [
                'image' => 'mimes:jpeg,png,jpg,gif,webp|max:5120',
                'id' => 'required',
                'category_id' => 'required|exists:categories,id',
            ]);

            if ($validation->fails()) {
                return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
            }

            // Xử lý upload ảnh
            $image_name = null;
            if ($request->hasFile('image')) {
                if ($request->id > 0) {
                    $image = Product::where('id', $request->id)->first();
                    if ($image) {
                        $image_path = "images/products/" . $image->image;
                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }
                }
                $image_name = $request->name . time() . '.' . $request->image->extension();
                $request->image->move(public_path('images/products/'), $image_name);
            } elseif ($request->id > 0) {
                $image_name = Product::where('id', $request->post('id'))->pluck('image')->first();
            }

            // Cập nhật hoặc tạo sản phẩm
            $productId = Product::updateOrCreate(
                ['id' => $request->id],
                [
                    'name' => $request->name,
                    'slug' => $request->slug,
                    'image' => $image_name,
                    'category_id' => $request->category_id,
                    'brand_id' => $request->brand_id,
                    'tax_id' => $request->tax_id,
                    'description' => $request->description,
                    'item_code' => $request->item_code,
                    'keywords' => $request->keywords
                ]
            )->id;

            // Xử lý thuộc tính
            ProductAttribute::where('product_id', $productId)->delete();
            if (isset($request->attribute_id) && is_array($request->attribute_id)) {
                foreach ($request->attribute_id as $val) {
                    ProductAttribute::updateOrCreate(
                        [
                            'product_id' => $productId,
                            'category_id' => $request->category_id,
                            'attribute_value_id' => $val
                        ]
                    );
                }
            }

            if (isset($request->sku) && is_array($request->sku)) {
                // Xóa tất cả các product attributes cũ của sản phẩm (nếu cần)
                ProductAttr::where('product_id', $productId)->whereNotIn('id', $request->productAttrId)->delete();

                foreach ($request->sku as $key => $val) {
                    if (isset($request->color_id[$key]) && isset($request->size_id[$key])) {
                        $productAttrId = ProductAttr::updateOrCreate(
                            ['id' => $request->productAttrId[$key]],
                            [
                                'product_id' => $productId,
                                'color_id' => $request->color_id[$key],
                                'size_id' => $request->size_id[$key],
                                'sku' => $val,
                                'mrp' => $request->mrp[$key] ?? null,
                                'price' => $request->price[$key] ?? null,
                                'qty' => $request->qty[$key] ?? 0,
                                'length' => $request->length[$key] ?? null,
                                'breadth' => $request->breadth[$key] ?? null,
                                'height' => $request->height[$key] ?? null,
                                'weight' => $request->weight[$key] ?? null,
                            ]
                        )->id;

                        // Xử lý hình ảnh thuộc tính sản phẩm
                        $imageVal = 'attr_image_' . $request->imageValue[$key];
                        if (isset($request->$imageVal) && is_array($request->$imageVal)) {
                            ProductAttrImages::where('product_attr_id', $productAttrId)->delete();

                            foreach ($request->$imageVal as $img) {
                                $image_name = $request->name . time() . '.' . $img->extension();
                                $img->move(public_path('images/productsAttr/'), $image_name);

                                ProductAttrImages::create([
                                    'product_id' => $productId,
                                    'product_attr_id' => $productAttrId,
                                    'image' => $image_name
                                ]);
                            }
                        }
                    }
                }
            }

            DB::commit();
            return $this->success(['reload' => true], 'Successfully updated');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 500);
        }
    }
    public function getAttributes(Request $request){
        $category_id = $request->category_id;
        $data = CategoryAttribute::where('category_id',$category_id)->with('attribute','values')->get();
        return $this->success(['data' => $data], 'Successfully updated');
//         prx($data->toArray());
    }

    public function removeAttrId(Request $request){
        $type = $request->type;
        DB::table($request->type)->where ('id',$request->id)->delete();
        return $this->success(['status' => 'success'], 'Successfully updated');
    }
}

