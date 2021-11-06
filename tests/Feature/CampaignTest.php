<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Carbon\Carbon;

class CampaignTest extends TestCase
{
    use RefreshDatabase;

    /**
     * check guest users cannot access campaigns list
     */
    public function test_guest_users_cannot_access_campaigns_list(){

        $response = $this->get('campaigns');

        $response->assertRedirect('login');
    }

    /**
     * check guest users cannot create a campaign
     */
    public function test_guest_users_cannot_create_campaigns(){

        $response = $this->post('campaigns', [
            'name' => 'Test Campaign',
            'startDate' => Carbon::now(),
            'endDate' => Carbon::tomorrow(),
            'dailyBudget' => 100,
            'totalBudget' => 500
        ]);

        $response->assertRedirect('login');
    }

    /**
     * check authenticated users can view campaigns
     */
    public function test_auth_users_can_view_campaigns(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('campaigns');

        $response->assertStatus(200);
    }

    /**
     * check authenticated users can create campaigns
     */
    public function test_auth_users_can_create_campaigns(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('campaigns', [
            'name' => 'Test Campaign',
            'startDate' => Carbon::now(),
            'endDate' => Carbon::tomorrow(),
            'dailyBudget' => 200,
            'totalBudget' => 500
        ]);

        $response->assertRedirect('campaigns');
    }

    
}
