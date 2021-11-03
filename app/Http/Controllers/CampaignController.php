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
        $campaigns = Campaign::paginate(5);
        return Inertia::render('Campaigns/Index', [
            'campaigns' => $campaigns
        ]);
    }

    /**
     * create new campaing
     */
    public function create()
    {
        
        return Inertia::render('Campaigns/Create', []);
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
        $campaign = Campaign::find($id);

        return Inertia::render('Campaigns/Edit', ['campaign'=>$campaign]);
         
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
