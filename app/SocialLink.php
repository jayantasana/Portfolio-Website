<?php

namespace App;

use Hamcrest\Core\Set;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SocialLink extends Model
{
    use SoftDeletes;
    function get_settings(){
        return $this->hasMany(Settings::class, 'social_id');
    }
}
