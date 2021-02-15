<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nncountry extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'countries';

  // user has many posts
  public function cities()
  {
    return $this->hasMany('App\Nncity', 'country_id');
  }
}
