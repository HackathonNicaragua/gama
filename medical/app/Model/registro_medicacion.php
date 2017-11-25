<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class registro_medicacion extends Model
{
  protected $table = 'registro_medicacion';
  protected $primaryKey = 'id_registro_medicacion';
  protected $guarded = array();
}
