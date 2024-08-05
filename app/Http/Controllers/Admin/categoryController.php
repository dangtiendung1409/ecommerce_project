<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
                        'slug' => $request->slug,
                        'image' => $image_name,
                        'parent_category_id' => $request->parent_category_id
                    ]
                );
            }else{
                Category::updateOrCreate(
                    ['id' => $request->id],
                    ['name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $image_name,
                    ]
                );
            }
                return $this->success(['reload' => true], 'Successfully updated');
            }
        }
}
