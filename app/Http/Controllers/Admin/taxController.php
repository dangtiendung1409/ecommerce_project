<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use Validator;
use App\Traits\ApiResponse;

class taxController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $data = Tax::get();
        return view('admin/Tax/tax', get_defined_vars());
    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'text' => 'required|string|max:255',
            'id' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json(['status' => 'error', 'message' => $validation->errors()], 400);
        } else {
            Tax::updateOrCreate(
                ['id' => $request->id],
                [
                    'text' => $request->text,
                ]
            );
        }

            return $this->success(['reload' => true], 'Successfully updated');
        }
}
