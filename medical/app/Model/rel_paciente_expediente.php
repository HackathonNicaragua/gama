<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rel_paciente_expediente extends Model
{
  protected $table = 'rel_paciente_expediente';
  protected $primaryKey = 'id_rel_paciente_expediente';
  protected $guarded = array();
}
