<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CDR3;

class CDR2 extends Model
{
    protected $table = 'cdr_cd2';

    public function cdr3()
    {
        return $this->hasMany(CDR3::class, 'maCDR2', 'maCDR2');
    }
}
