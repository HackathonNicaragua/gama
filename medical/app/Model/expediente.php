<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class expediente extends Model
{
    protected $table = 'expediente';
    protected $primaryKey = 'id_expediente';
    protected $guarded = array();
    public $timestamps = false;
}