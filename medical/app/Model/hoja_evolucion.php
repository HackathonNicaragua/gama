<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class hoja_evolucion extends Model
{
  protected $table = 'hoja_evolucion';
  protected $primaryKey = 'id_hoja_evolucion';
  protected $guarded = array();
  public $timestamps = false;
}
