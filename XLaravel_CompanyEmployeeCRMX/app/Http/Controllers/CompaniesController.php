<?php 
namespace App\Http\Controllers;
use App\Mail\NewCompanyNotification;
use Mail;
use App\Company;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect; 
 
class CompaniesController extends Controller {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::paginate(10);		
		return view('companies.index', compact('companies'));
	}
 
    public function sendEmailNotification($input)
    {
		$data = array( 'email' => $input['email'], 'name' => $input['name'], 'from' => 'from@laraveltest.com', 'from_name' => 'New Company Notification' );
		Mail::send( 'companies.notification', $data, function( $message ) use ($data)
		{
			$message->to( $data['email'] )->from( $data['from'], $data['name'] )->subject( 'A New Company Notification!' );
		});	
    } 
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('companies.create');
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = $this->imageProcessing();
		Company::create( $input );		
		$this->sendEmailNotification($input);
		return Redirect::route('companies.index')->with('message', 'Company created');
	}
	
	public function imageProcessing()
	{
		$this->validate(Request(), [
			'name' => 'required',
			'slug' => 'required',
			'logo' => 'required|image|mimes:jpg,jpeg,png,gif|dimensions:min_width=100px,min_height=100px',
		]);
		
		$input = Input::all();
		$fileName = null;
		if (Request()->hasFile('logo')) {
			$file = request()->file('logo');
			$fileName = $file->getClientOriginalName();
			$file->move(base_path('\uploads'), $fileName);    
			$input['logo'] = Request()->file('logo')->getClientOriginalName();
		}	
		return $input;
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function show(Company $company)
	{
		return view('companies.show', compact('company'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function edit(Company $company)
	{
		return view('companies.edit', compact('company'));	
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function update(Company $company)
	{
		//$input = array_except(Input::all(), '_method');
		$input = $this->imageProcessing();
		$company->update($input);				
		return Redirect::route('companies.show', $company->slug)->with('message', 'Company updated.');
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function destroy(Company $company)
	{
		$company->delete();
	 
		return Redirect::route('companies.index')->with('message', 'Company deleted.');
	} 
}