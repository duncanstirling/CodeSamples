<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Candidate extends Model
{
    use HasFactory;

	/**
	* The database table used by the model.
	*
	* @var string
	*/
	protected $table = 'test1candidates';

    public function user()
    {
    	return $this->belongsTo(User::class);
    }	
}
