<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = ['username', 'email', 'password', 'name', 'slug', 'description', 'website', 'logo'];
	
	public function employees()
	{
		return $this->hasMany('App\Employee');
	}
	
	public function company()
	{
		return $this->belongsTo('App\Company');
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
}
