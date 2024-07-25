<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
class dashboardController extends Controller
{
    use ApiResponse;
    public function index() {
        return view('admin/index');
    }
    public function deleteData($id='', $table = '')
    {
        DB::table(''.$table.'')->where('id',$id)->delete();
        return $this->success(['reload'=>true],'Successfully deleted');
    }
}
