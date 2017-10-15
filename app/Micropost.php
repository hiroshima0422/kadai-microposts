<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id','micropost_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //**********************************
    //お気に入り
    //**********************************
    
    public function oki_followers()
    {
        return $this->belongsToMany(User::class, 'user_micropost', 'micropost_id', 'user_id')->withTimestamps();
    }
    
}
