<?php

namespace App\Services;

use App\Models\Creative;
use Illuminate\Http\Request;
use Storage;

class CreativeService 
{

    public function create(Request $request){

      
        $image_path = '';

    if ($request->hasFile('image')) {
        $image_path = $request->file('image')->store('images', 'public');
        $image_url = Storage::disk('public')->url($image_path);
    }

    $data = Creative::create([
        'name' => $request->name,
        'fileUrl' => $image_url
    ]);

    return $data;
    }

    public function update(Request $request){

        $image_path = '';

    if ($request->hasFile('image')) {
        $image_path = $request->file('image')->store('image', 'public');
    }

    $creative = Creative::find($request->creativeId);

    $data = $creative->update([
        'name' => $request->name,
        'fileUrl' => $image_path,
    ]);

    return $data;

    }

}
?>
