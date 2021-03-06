<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
	// Runs the unit tests using php artisan test
	
    /**
     * register link
     *
     * @return void
     */
    public function testRegister()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
	
    /**
     * privacy policy link
     *
     * @return void
     */
    public function testPrivacyPolicy()
    {
        $response = $this->get('/privacypolicy');
        $response->assertStatus(200);
    }
	
    /**
     * place advert before logged in
     *
     * @return void
     */
    public function testAdvertise()
    {
        $response = $this->get('/new-post');
		$response->assertRedirect('auth/login');
    }	
	
	
    /**
     * test search 1
     *
     * @return void
     */
    public function testHomePageForm1()
    {
        $response = $this->call('POST', '/search', array(
			'_token' => csrf_token(),
			'searchcat' => 'Auto Glass',
			'catHidden' => '1_1',
			'searchloc' => 'Brighton',
			'locHidden' => '23_136',			
			'test' => '1'
        ));

		$this->assertEquals(200, $response->getStatusCode());
    }	
	
    /**
     * test search 2
     *
     * @return void
     */	
    public function testHomePageForm2()
    {	
		$response = $this->withSession(['_token' => 'covfefe'])
        ->post('/search', [
			'_token' => 'covfefe',
			'searchcat' => 'Auto Glass',
			'catHidden' => '1_1',
			'searchloc' => 'Brighton',
			'locHidden' => '23_136',
			'test' => '1'
			]);

		$this->assertEquals(200, $response->getStatusCode());
    }		
}
