<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testTest1()
    {
        $response = $this->get('/test1');
        $response->assertStatus(200);
    }
	
    /**
     * Home page
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->get('/');
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
     * search
     *
     * @return void
     */
    public function testSearcch()
    {
        $response = $this->get('/search');
        $response->assertStatus(302);
    }
	
    /**
     * redirect to login if create new post without being logged in
     *
     * @return void
     */
    public function testNewPost()
    {
        $response = $this->get('/new-post');
        $response->assertStatus(302);
    }		
}
