<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HangChucDanh extends Model
{
    protected $table = 'kd97_hang_chuc_danh';
    protected $fillable = ['maHangVB','tenHang','created_at','updated_at'];
}
