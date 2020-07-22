<?php

namespace App;

// use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'status', 'author_id', 'email', 'url', 'post_id'
    ];

    // /**
    //  * The attributes excluded from the model's JSON form.
    //  *
    //  * @var array
    //  */
    protected $hidden = [
        'author_id', 'post_id'
    ];

    public function Author()
    {
        return $this->belongsTo('App\Author');
    }

    public function Post()
    {
        return $this->belongsTo('App\Post');
    }
}
