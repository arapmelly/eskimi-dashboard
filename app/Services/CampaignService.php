<?php

namespace App\Services;

use App\Models\Campaign;
use Illuminate\Http\Request;
use Storage;

class CampaignService 
{

    public function create(Request $request){

      
    $data = Campaign::create([
        'name' => $request->name,
        'startDate' => $request->startDate,
        'endDate' => $request->endDate,
        'timezone' => config('app.timezone'),
        'dailyBudget' => $request->dailyBudget,
        'totalBudget' => $request->totalBudget,
        'currency' => config('app.currency')
    ]);

    return $data;
    }

    public function update(Request $request){

    $campaign = Campaign::find($request->campaignId);

    $data = $campaign->update([
        'name' => $request->name,
        'startDate' => $request->startDate,
        'endDate' => $request->endDate,
        'timezone' => config('app.timezone'),
        'dailyBudget' => $request->dailyBudget,
        'totalBudget' => $request->totalBudget,
        'currency' => config('app.currency')
    ]);

    return $data;

    }

}
?>
