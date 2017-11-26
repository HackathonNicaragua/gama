<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rel_hospital_user extends Model
{
  protected $table = 'rel_hospital_user';
  protected $primaryKey = 'id_rel_hospital_user';
  protected $guarded = array();
  public $timestamps = false;
}
