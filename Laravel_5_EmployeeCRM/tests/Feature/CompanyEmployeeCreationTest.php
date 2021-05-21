<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BasicOneTest extends TestCase
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
			'_token'  => 'eBUrEsxlyOlwhJ58aDCxijitR8YqouvbenSyUQtU',
			'name'    => 'Duncan Stirling',
			'slug'    => 'employee-91',
			'email'   => 'dgstirling@yahoo.co.uk',
			'website' => 'abc.com',
			'logo'    => UploadedFile::fake()->image('duncanFakeFile.png', 600, 600)
		]);		

		$controller = new CompaniesController();
		$response = $controller->store($request);
				
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
			'_token'     => '10IWxeqfSxmbA3s3ItUG0azlj3s83BB25ROyv4m6',
			'firstName'  => 'duncan6',
			'lastName'   => 'stirling6',
			'slug'       => 'employee-6',
			'company_id' => '3'
		]);						
		
		$controller = new EmployeesController();
		$response   = $controller->store($request);
		$this->assertEquals(302, $response->getStatusCode());
        //$this->assertTrue(true);
    }
}
