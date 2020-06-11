<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function guide_details(){
        return $this->hasMany('App\GuideDetail');
    }
    public function guide_posts(){
        return $this->hasMany('App\GuidePost');
    }
    public function guide_videos(){
        return $this->hasMany('App\GuideVideo');
    }
}
