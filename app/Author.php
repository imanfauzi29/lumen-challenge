<?php

namespace App;

// use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'salt', 'email', 'profile'
    ];

    // /**
    //  * The attributes excluded from the model's JSON form.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password',
    // ];

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
