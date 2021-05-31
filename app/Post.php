<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];//titleとbodyは変更可能

    public function comments(){
        return $this -> hasMany('App\Comment');
    }
    public function user(){
        return $this -> belongsTo('App\User');
    }
}
