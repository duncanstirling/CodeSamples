<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Http\Controllers\CompaniesController;

class BasicTest1 extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatingCompany()
    {	
		Event::fake();	
		$request = Request::create('/store', 'POST',[
			'_token' => 'eBUrEsxlyOlwhJ58aDCxijitR8YqouvbenSyUQtU',
			'name' => 'Duncan Stirling',
			'slug' => 'employee-91',
			'email' => 'dgstirling@yahoo.co.uk',
			'website' => 'abc.com',
			'logo' => 'duncanImage2.jpg'
		]);		

		$controller = new Companies();
		$response = $controller->create($request);
		$this->assertEquals(302, $response->getStatusCode());
        //$this->assertTrue(true);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatingEmployee()
    {	
		Event::fake();	
		$request = Request::create('/store', 'POST',[
			'_token' => '10IWxeqfSxmbA3s3ItUG0azlj3s83BB25ROyv4m6',
			'firstName' => 'duncan6',
			'lastName' => 'stirling6',
			'slug' => 'employee-6',
			'company_id' => '3'
		]);						
		
		$controller = new Employees();
		$response = $controller->create($request);
		$this->assertEquals(302, $response->getStatusCode());
        //$this->assertTrue(true);
    }	
}
