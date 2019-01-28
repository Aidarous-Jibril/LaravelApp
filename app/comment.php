<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DatePresenter;

class comment extends Model
{
    

    // fields can be filled
    protected $fillable = ['body', 'post_id'];

    
    //COMMENT
    //comments belongs to post
    public function post(){
        return $this->belongsTo('App\Post');
    }

    //comments belongs to User
    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
