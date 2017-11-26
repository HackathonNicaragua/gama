<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
  protected $table = 'hospital';
  protected $primaryKey = 'id_hospital';
  protected $guarded = array();
  public $timestamps = false;
}
