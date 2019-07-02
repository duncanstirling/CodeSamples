<?php 
// /app/Http/Controllers/EmployeesController.php
namespace App\Http\Controllers;
 
use App\Company;
use App\Employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;
 
class EmployeesController extends Controller {
 
	/**
	 * Display a listing of the resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function index(Company $company)
	{
		return view('employees.index', compact('company'));
	}
 
	/**
	 * Show the form for creating a new resource.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function create(Company $company)
	{
		return view('employees.create', compact('company'));
	}
 
	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Company $company
	 * @return Response
	 */
	public function store(Company $company)
	{
		//
	}
 
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function show(Company $company, Employee $employee)
	{
		return view('employees.show', compact('company', 'employee'));
	}
 
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function edit(Company $company, Employee $employee)
	{
		return view('employees.edit', compact('company', 'employee'));
	}
 
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function update(Company $company, Employee $employee)
	{
		//
	}
 
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Company $company
	 * @param  \App\Employee    $employee
	 * @return Response
	 */
	public function destroy(Company $company, Employee $employee)
	{
		//
	}
 
}