<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
  protected $table = 'paciente';
  protected $primaryKey = 'id_paciente';
  protected $guarded = array();
  public $timestamps = false;
}
