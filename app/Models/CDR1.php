<?php

namespace App\Models;

use App\Models\CDR2;
use App\Models\CDR3;
use Illuminate\Database\Eloquent\Model;

class CDR1 extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cdr_cd1';


    public function cdr2()
    {
        return $this->hasMany(CDR2::class, 'maCDR1', 'maCDR1');
    }

   
}
