<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPegawai extends Model
{
    public function outlet()
    {
        return $this->belongsTo('App\outlet');
    }
}
