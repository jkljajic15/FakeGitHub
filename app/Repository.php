<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function issues(){
        return $this->hasMany(Issue::class);
    }

    public function usersThatStarredARepository(){
        return $this->belongsToMany(User::class, 'starred_repositories');
    }

    public function starredRepositories(){
        return $this->hasMany(StarredRepository::class);
    }

    public function contributors(){
        return $this->hasMany(Contributor::class);
    }

    public function files(){
        return $this->hasMany(File::class);
    }
}
