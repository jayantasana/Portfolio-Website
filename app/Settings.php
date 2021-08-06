<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use SoftDeletes;
    function get_social(){
        return $this->belongsTo(Social::class, 'social_id');
    }

    function get_sociallink(){
        return $this->belongsTo(SocialLink::class, 'social_id');
    }
}
