<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function repositories(){
        return $this->hasMany(Repository::class);
    }

    public function repositoriesStarredByUser(){
        return $this->belongsToMany(Repository::class,
            'starred_repositories', 'user_id', 'repository_id');
    }

    public function followers(){
        return $this->hasMany(Follower::class); //todo fix belongs to many? attach detach
    }

    public function followees(){
        return $this->hasMany(Followee::class);
    }
}
