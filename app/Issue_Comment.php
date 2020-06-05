<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue_Comment extends Model
{
    public function issue(){
        return $this->belongsTo(Issue::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
