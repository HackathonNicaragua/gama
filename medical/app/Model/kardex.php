<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class kardex extends Model
{
  protected $table = 'kardex';
  protected $primaryKey = 'id_kardex';
  protected $guarded = array();
}
