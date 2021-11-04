<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CreativeService;
use App\Http\Requests\CreativeRequest;
use App\Http\Requests\CreativeUpdateRequest;
use App\Models\Creative;
use Inertia\Inertia;
use Redirect;

class CreativeController extends Controller
{
    //

    /**
     * list all creatives
     */
    public function index(){

        $creatives = Creative::paginate(5);
        return Inertia::render('Creatives/Index', [
            'creatives' => $creatives
        ]);

    }

    /**
     * create a new creative
     */
    public function create(){

        return Inertia::render('Creatives/Create', []);
    }

    /**
     * store a new creative
     */
    public function store(CreativeRequest $request){

        $creative = CreativeService::create($request);
        return Redirect::route('creatives.index');
    }


     /**
     * edit creative
     */
    public function edit($id){

        $creative = Creative::find($id);
        return Inertia::render('Creatives/Edit', ['creative'=>$creative]);
    }


    /**
     * update creative
     */
    public function update(CreativeUpdateRequest $request){

        $creative = CreativeService::update($request);
        return Redirect::route('creatives.index');
    }

    /**
     * delete creative
     */
    public function delete($id){
        Creative::destroy($id);
        return Redirect::route('creatives.index');
    }
}
