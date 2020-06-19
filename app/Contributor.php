<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    //
    protected $guarded = [];

    protected $with = ['user'];

    public function repository(){
        return $this->belongsTo(Repository::class);
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
