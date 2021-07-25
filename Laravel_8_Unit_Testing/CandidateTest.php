<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Candidate;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CandidateTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
	
    public function test_users_can_authenticate_using_the_login_screen()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }	
	
	public function test_logged_in_users_can_create_candidates()
    {
        $user      = User::factory()->create();
		$candidate = Candidate::factory()->create();
		
        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->call('POST', 'candidate', array(
		'_token' => csrf_token(),
			'description' => $candidate->description,
			'currency'    => $candidate->currency,
			'rate'        => $candidate->rate,
			'user_id'     => $candidate->user_id			
		));

		$this->assertEquals(302, $response->getStatusCode());
		$response->assertRedirect('/dashboard');
	}
    public function test_none_authenticated_users_redirect_to_login()
    {
		$candidate = Candidate::factory()->create();
		
        $response = $this->call('POST', 'candidate', array(
		'_token' => csrf_token(),
			'description' => $candidate->description,
			'currency'    => $candidate->currency,
			'rate'        => $candidate->rate,
			'user_id'     => $candidate->user_id			
		));

		$this->assertEquals(302, $response->getStatusCode());
		$response->assertRedirect('/login');
	}

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
