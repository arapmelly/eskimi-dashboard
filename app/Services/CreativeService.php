<?php

namespace App\Services;

use App\Models\Creative;
use Illuminate\Http\Request;
use Storage;

class CreativeService 
{

    public function create(Request $request){

      
     $uploadUrl = self::upload($request);

     if(isset($uploadUrl)){
         
        $data = Creative::create([
            'name' => $request->name,
            'fileUrl' => $uploadUrl
        ]);
    
        return $data;

     } else {

         return null;
     }
    
    }

    public function update(Request $request){

    $uploadUrl = self::upload($request);

    if(isset($uploadUrl)){
        $creative = Creative::find($request->creativeId);

        $data = $creative->update([
            'name' => $request->name,
            'fileUrl' => $uploadUrl,
        ]);

        return $data;
    } else {

        return null;
    }
    

    }

    /**
     * upload file
     */
    public function upload($request){

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $imageUrl = Storage::disk('public')->url($imagePath);
        } else {
            $imageUrl = null;
        }

        return $imageUrl;
    
    }

}
?>
