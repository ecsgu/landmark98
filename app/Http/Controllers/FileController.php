<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{

    public function index()
    {
        return view('DemoUpload');
    }

    public function doUpload(Request $request)
    {

        $file = $request->filesTest;
        $Name = md5_file($file->getRealPath());
        // Lấy đuôi file
        $array = explode('.',$file->getClientOriginalName());
        $Extend = end($array);

        // Upload lên server
        $file->move('upload', $Name.'.'.$Extend );
    }
}
