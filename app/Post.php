<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Table Name
    protected $post = 'posts';
    //Primary Key
    public $primaryKey = 'id';
    //TimesStamp
    public $timestamps = true;

    
    //here one to one relationship / 1user has many posts
    public function user(){
        return $this->belongsTo('App\User');
    }

    //here one to one relationship /manyComments has one post
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    

}
