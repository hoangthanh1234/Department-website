<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class BacChucDanh extends Model
{
    protected $table = 'kd97_bac_chuc_danh';
    protected $fillable = ['maBacVB','tenBac','heSo','id_chuc_danh','created_at','updated_at'];
}
