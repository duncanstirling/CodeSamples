<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nninternationalcity extends Model
{
  //restricts columns from modifying
  protected $guarded = [];

  // returns the instance of the country where the city belongs
  public function country()
  {
    return $this->belongsTo('App\Nncountry', 'country_id');
  }
}
