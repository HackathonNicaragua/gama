<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class enfermedades extends Model
{
  protected $table = 'enfermedades';
  protected $primaryKey = 'id_enfermedades';
  protected $guarded = array();
  public $timestamps = false;
}
