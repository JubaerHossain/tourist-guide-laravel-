<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function balance(){
        return $this->hasOne('App\Balance');
    }
}
