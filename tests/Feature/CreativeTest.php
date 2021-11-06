<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use Carbon\Carbon;

class CreativeTest extends TestCase
{

    use RefreshDatabase;
    
     /**
     * check guest users cannot access creatives list
     */
    public function test_guest_users_cannot_access_creatives_list(){

        $response = $this->get('creatives');

        $response->assertRedirect('login');
    }

    /**
     * check guest users cannot create a creative
     */
    public function test_guest_users_cannot_create_creatives(){

        $response = $this->post('creatives', [
            'name' => 'Test Creative',
            'fileUrl' => ''
        ]);

        $response->assertRedirect('login');
    }

    /**
     * check authenticated users can view creatives
     */
    public function test_auth_users_can_view_creatives(){

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('creatives');

        $response->assertStatus(200);
    }

    /**
     * check authenticated users can create creatives
     */
    public function test_auth_users_can_create_creatives(){

        $user = User::factory()->create();

        $filePath = public_path('assets/seat2.png');

        $response = $this->actingAs($user)->post('creatives', [
            'name' => 'Test Creative',
            'image' => new UploadedFile($filePath,'test.png', null, null, true),
        ]);


        $response->assertRedirect('creatives');
    }

}
