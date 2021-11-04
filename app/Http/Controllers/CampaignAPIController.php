<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\Creative;
use App\Models\User;
use App\Http\Requests\CampaignAPIRequest;
use App\Http\Requests\TokenRequest;
use App\Services\CampaignService;
use App\Services\CreativeService;
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
    public function createCampaign(CampaignAPIRequest $request){

        
        try {

            //upload files
            $uploadUrl = CreativeService::upload($request);

            if (isset($uploadUrl)) {
                
                //create campaign
                $campaign = CampaignService::create($request);

                if(isset($campaign)){

                    //create creative and attach to campaign.
                    
                    $creative = Creative::create([
                        'name' => $request->name,
                        'fileUrl' => $uploadUrl
                    ]);

                    $campaign->creatives()->sync($creative->id);
                }

                $data = Campaign::with('creatives')->find($campaign->id);

                $response = [
                    'status'=>true,
                    'message'=> 'success',
                    'data' => $data
                ];
                
            } else {

                $response = [
                    'status'=>false,
                    'message'=> 'failed',
                    'data' => 'image upload failed'
                ];

            }


            

        } catch(\Exception $e){

            $response = [
                'status'=>false,
                'message'=> 'failed',
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
