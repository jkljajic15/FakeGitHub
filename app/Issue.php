<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $guarded = [];

    public function repository(){
        return $this->belongsTo(Repository::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }


}
