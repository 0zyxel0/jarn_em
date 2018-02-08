<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\EmployeeImage;
use Faker\Provider\Uuid;
use DB;

class UploadController extends Controller
{

    public function store(Request $request)
    {

        $genid = Uuid::uuid();
        $userId = $request->userId;
        $ext = $request->image_file->extension();
        $pathmade =  'public/photo_library/'.$genid.'.'.$ext;

        $image = new EmployeeImage();

        if($request->hasFile('image_file')){
            $request->file('image_file');

            $request->image_file->storeAs('public/photo_library',$genid.'.'.$ext);

            $image->imageid = $genid;
            $image->imageurl = $pathmade;
            $image->partyid = $userId;
            $image->updatedBy = $request->updatedby;
            $image->save();

            return redirect('/profile/'.$userId);
        }else{
            return 'No File Selected';
        }

    }


}
