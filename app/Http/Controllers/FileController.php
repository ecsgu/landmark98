<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TopicController;

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
            echo $request;
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
        TopicController::store($request);
        header("Refresh:0; url=./");
    }
    public function doUploadtmp(Request $request)
    {
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
            return $filename;
        }
        return "upload/defaultCus.jpg";
    }
}
