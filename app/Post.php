<?php

namespace App;

// use Illuminate\Auth\Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'tags', 'status', 'author_id'
    ];

    // /**
    //  * The attributes excluded from the model's JSON form.
    //  *
    //  * @var array
    //  */
    protected $hidden = [
        'author_id',
    ];

    public function Author()
    {
        return $this->belongsTo('App\Author');
    }
}
