<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin/profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name'    => 'required|string|max:255',
            'email'   => 'required|string|email|unique:users,email,'.Auth::User()->id,
//            'password'=> 'required|string|min:6|confirmed',
             'image'   => 'mimes:jpeg,png,jpg,gif|max:5120',//max 5 MB
            // 'user_id' => 'required|exists:users,id'
            'address'    => 'required|string|max:255',
            'twitter_link'    => 'string|max:255',
            'insta_link'    => 'string|max:255',
            'fb_link'    => 'required|string|max:255',
        ]);

        if($validation->fails()){
            return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
//            return response()->json(['status'=>400,'message'=>$validation->errors()->first()]);
        }else{
            if($request->hasFile('image')){
                $image_name = 'images/'.$request->name.time().'.'.$request->image->extension();
                $request->image->move(public_path('images/'),$image_name);
            }else{
                $image_name = Auth::User()->image;
            }
            $user = User::updateOrCreate (
                ['id' => Auth::User()->id],
                [
                    'name' => $request->name,
                    'email'=> $request->email,
                    'phone'=>$request->phone,
                    'image'=>$image_name,
                    'address'=>$request->address,
                    'fb_link'=>$request->fb_link,
                    'twitter_link'=>$request->twitter_link,
                    'insta_link'=>$request->insta_link
                ]
            );
//            return response()->json(['status'=>200,'message'=> 'Successfully updated']);
            return $this->success(['reload'=>true],'Successfully updated');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
