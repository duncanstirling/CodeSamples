<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
	protected $fillable = ['username', 'email', 'password', 'firstName', 'lastName', 'email', 'phone', 'slug', 'company_id', 'declined'];
	
	public function employee()
	{
		return $this->belongsTo('App\Employee');
	}	
	
	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}

	public function company()
	{
		return $this->belongsTo('App\Company');
	}	
}
