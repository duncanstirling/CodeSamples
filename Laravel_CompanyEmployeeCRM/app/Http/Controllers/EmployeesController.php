<?php 
namespace App\Http\Controllers;
 
// /app/Http/Controllers/CompaniesController.php 
 
use App\Company;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Input;
use Redirect;
 
class EmployeesController extends Controller {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function index(Company $company)
	{
		$employees = Employee::all();
		return view('employees.index', compact('employees'));
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */

	 public function create()	
	{
		$company   = new Company();
		$companies = $company->pluck('name', 'id')->toArray();		
		//return view('employees.create', compact('company','companies'));
		return view('employees.create', compact('companies'));		
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = $request->all();
		Employee::create( $input );
	 
		return Redirect::route('employees.show', $request->slug)->with('message', 'Employee created.');
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function show(Employee $employee)
	{
		return view('employees.show', compact('employee'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function edit(Employee $employee)
	{
		$company = new Company();
		$companies = $company->pluck('name', 'id')->toArray();		
		return view('employees.edit', compact('employee', 'companies'));
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function update(Employee $employee)
	{
		$input = array_except(Input::all(), '_method');
		$employee->update($input);
		return Redirect::route('employees.show', [$employee->slug])->with('message', 'Employee updated.');
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function destroy(Employee $employee)
	{
		$employee->delete();
		return Redirect::route('employees.show')->with('message', 'Employee deleted.');
	}
}