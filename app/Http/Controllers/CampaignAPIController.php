<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\User;
use App\Http\Requests\CampaignAPIRequest;
use App\Http\Requests\TokenRequest;
use App\Services\CampaignService;
use Hash;

class CampaignAPIController extends Controller
{
    //

    /**
     * list campaigns
     */
    public function getCampaigns(){

        try {

            $campaigns = Campaign::with('creatives')->get();
        $response = [
            'status'=>'success',
            'data' => $campaigns
        ];

        } catch(\Exception $e){
            $response = [
                'status'=>'failed',
                'data' => $e->getMessage()
            ];
        }
        

        return response()->json($response);
    }


    /**
     * create campaigns
     */
    public function createCampaign(CampaignAPIRequest $request, CampaignService $service){

        try {

            $campaign = $service->create($request);

            $response = [
                'status'=>'success',
                'data' => $campaign
            ];

        } catch(\Exception $e){

            $response = [
                'status'=>'failed',
                'data' => $e->getMessage()
            ];

        }

        return response()->json($response);
    }


    /**
     * create token
     */
    public function getToken(TokenRequest $request){

        $user = User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
            
            $response = [
                'status'=>'failed',
                'data' => [
                    'email' => 'The provided credentials are incorrect.',
                ]
            ];
        }
    
        $token = $user->createToken($request->device)->plainTextToken;

        $response = [
            'status'=>'success',
            'data' => [
                'token' => $token,
            ]
        ];

        return response()->json($response);
    }
}
