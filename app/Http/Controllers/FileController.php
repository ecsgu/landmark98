<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class FileController extends Controller
{

    public function index()
    {
        return view('pages/landmark');
    }

    public function doUpload(Request $request)
    {
        if(isset($request->image))
        {
            $file = $request->image;
            $array = explode('.',$file->getClientOriginalName());
            $Extend = end($array);

            $Name = md5($file->getClientOriginalName() . "." . str_random());
            // Lấy đuôi file

            // Upload lên server
            $filename=$file->move('upload', $Name.'.'.$Extend );

            //echo "hello mother fucker";
            //Update database topic
            $request->request->add(['filename' => $filename]);
        }
        if(isset($request->caption))
            return TopicController::store($request);
        else
            return CustomerController::edit($request);
    }
    public function doUploadtmp(Request $request)
    {
        $file = new Filesystem;
        $file->cleanDirectory(public_path().'/tmp');
        if($request->image)
        {
            $file = $request->image;
            $array = explode('.',$file->getClientOriginalName());
            $Extend = end($array);

            $Name = md5($file->getClientOriginalName() . "." . str_random());
            // Lấy đuôi file

            // Upload lên server
            $filename=$file->move('tmp', $Name.'.'.$Extend );

            //echo "hello mother fucker";
            //Update database topic
            $request->request->add(['filename' => $filename]);
            return url('/')."/".$filename;
        }
        return "upload/defaultCus.jpg";
    }
}
