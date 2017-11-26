<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
  protected $table = 'medicamento';
  protected $primaryKey = 'id_medicamento';
  protected $guarded = array();
  public $timestamps = false;
}
