<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\HomeBanner;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\File;

class categoryController extends Controller
{
    use ApiResponse, SaveFile;

    public function index()
    {
        $data = Category::get();
        return view('admin/Category/category', get_defined_vars());
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:5120',//max 5 MB
            'id' => 'required'
        ]);
        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
//            return response()->json(['status'=>400,'message'=>$validation->errors()->first()]);
        } else {
            $slug = replaceStr($request->slug);
            $image_name = null;
            if ($request->hasFile('image')) {
                $image_name = $this->saveImage($request->file('image'), '', 'images/categories'); // Truyền đường dẫn lưu tệp
            } elseif ($request->id > 0) {
                $image_name = Category::where('id', $request->id)->pluck('image')->first();
            }

            if($request->parent_category_id != 0 ) {
                Category::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->name,
                        'slug' => $slug,
                        'image' => $image_name,
                        'parent_category_id' => $request->parent_category_id
                    ]
                );
            }else{
                Category::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->name,
                        'slug' => $slug,
                        'image' => $image_name,
                    ]
                );
            }
                return $this->success(['reload' => true], 'Successfully updated');
            }
        }

    public function index_category_attribute()
    {
        $data = CategoryAttribute::with('category','attribute')->get();
        $category = Category::get();
        $attribute = Attribute::get();
//        prx($data->toArray());
        return view('admin/Category/category_attribute', get_defined_vars());
    }
    public function store_category_attribute(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'attribute_id'    => 'required|exists:attribute,id',
            'category_id'    => 'required|exists:category,id',
            'id' => 'required'
        ]);
        CategoryAttribute::updateOrCreate(
            ['id' =>$request->id],
            ['attribute_id'=>$request->attribute_id, 'category_id'=>$request->category_id]
        );
        return $this->success(['reload'=>true],'Successfully updated');
    }
}
