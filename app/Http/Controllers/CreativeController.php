<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CreativeService;
use App\Http\Requests\CreativeRequest;
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
    public function store(CreativeRequest $request, CreativeService $service){

        $creative = $service->create($request);
        return Redirect::route('creatives.index');
    }
}
