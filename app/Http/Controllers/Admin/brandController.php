<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Support\Facades\File;

class brandController extends Controller
{
    use ApiResponse, SaveFile;
    public function index()
    {
        $data = Brand::get();
        return view('admin/Brand/brands', get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text' => 'required|string|max:255',
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:5120', // max 5 MB
            'id' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
        } else {
//            if ($request->hasFile('image')) {
//                $image_name = $this->saveImage($request->file('image'), '', 'images/brand'); // Gọi phương thức saveImage từ trait SaveFile
//            } elseif ($request->id > 0) {
//                $image_name = Brand::where('id', $request->id)->pluck('image')->first();
//            } else {
//                $image_name = null;
//            }
              if($request->id > 0) {
                   $image = Brand::find($request->id);
                   $imageName = $image->image;
                   $imageName = $this->saveImage($request->image, $imageName,'images/brand');
              } else {
                  $imageName = $this->saveImage($request->image, '','images/brand');
              };
            Brand::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                    'image' => $imageName
                ]
            );
            return $this->success(['reload' => true], 'Successfully updated');
        }
    }
}
