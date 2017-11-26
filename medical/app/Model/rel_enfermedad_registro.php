<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class rel_enfermedad_registro extends Model
{
  protected $table = 'rel_enfermedad_registro';
  protected $primaryKey = 'id_rel_enfermedad_registro';
  protected $guarded = array();
  public $timestamps = false;
}
