<?php

namespace App\Services;

use App\Models\Creative;
use Illuminate\Http\Request;

class CreativeService 
{

    public function create(Request $request){

      
        $image_path = '';

    if ($request->hasFile('image')) {
        $image_path = $request->file('image')->store('image', 'public');
    }

    $data = Creative::create([
        'name' => $request->name,
        'fileUrl' => $image_path,
    ]);

    return $data;
    }

    public function update(Request $request, $id){

        $creative = Creative::find($id);
        $creative = $creative->update([
            'name' => $request->name,
            'fileUrl' => $request->startDate,
        ]);

        return $creative;
    }

}
?>
