<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
  protected $guarded = [];

    public function profileImage(){

        return ($this->image) ? '/storage/' . $this->image : '/storage/profile/fvs5yyRWLvBZRVgNWXgwpGIjb1vWDuXRE9t3qpX5.png';
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user() {
return $this->belongsTo(User::class);
    }

}
