<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Validator;

class couponController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = Coupon::get();
        return view('admin/Coupon/coupon',get_defined_vars());
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'    => 'required|string|max:255',
            'type'    => 'required|numeric|in:1,2',
            'value'    => 'required|numeric',
            'minValue'    => 'required|numeric',
            'id' => 'required',
        ]);
        Coupon::updateOrCreate(
            ['id' =>$request->id],
            [
                'name'=>$request->name,
                'type'=>$request->type,
                'value'=>$request->value,
                'minValue'=>$request->minValue,
            ]
        );
        return $this->success(['reload'=>true],'Successfully updated');
    }
}
