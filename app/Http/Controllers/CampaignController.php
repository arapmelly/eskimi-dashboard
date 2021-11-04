<?php

namespace App\Http\Controllers;

use App\Http\Requests\CampaignRequest;
use App\Http\Requests\CampaignUpdateRequest;
use App\Services\CampaignService;
use App\Models\Campaign;
use App\Models\Creative;
use Inertia\Inertia;
use Redirect;

class CampaignController extends Controller
{
    /**
     * list all campaigns
     */
    public function index()
    {
        $campaigns = Campaign::with('creatives')->paginate(5);
        return Inertia::render('Campaigns/Index', [
            'campaigns' => $campaigns
        ]);
    }

    /**
     * create new campaing
     */
    public function create()
    {
        $creatives = Creative::all();
        return Inertia::render('Campaigns/Create', ['creatives'=>$creatives]);
    }

    /**
     * store new campaing
     */
    public function store(CampaignRequest $request, CampaignService $service)
    {
       
        $campaign = $service->create($request);

        return redirect('campaigns');
    }

     /**
     * edit campaing
     */
    public function edit($id)
    {
        $campaign = Campaign::with('creatives')->find($id);

        $creatives = Creative::all();

        return Inertia::render('Campaigns/Edit', ['campaign'=>$campaign, 'creatives'=>$creatives]);
         
    }

    /**
     * update campaing
     */
    public function update(CampaignUpdateRequest $request, CampaignService $service)
    {
       
        $campaign = $service->update($request);

        return redirect('campaigns');
    }

    /**
     * delete
     */
    public function delete($id){

        Campaign::destroy($id);

        return redirect('campaigns');

    }
}
