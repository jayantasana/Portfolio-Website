<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;
    function abouts(){
        return $this->hasMany(Settings::class, 'social_id');
    }

}
