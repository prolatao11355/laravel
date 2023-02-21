<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'comment', 'image'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    public function likedUsers(){
        return $this->belongsToMany('App\Models\User', 'likes');
    }
    public function isLikedBy($user){
        $liked_user_ids = $this->likedUsers->pluck('id');
        $result = $liked_user_ids->contains($user->id);
        return $result;
    }
    public function Sorting(){
        return $this->belongsToMany('App\Models\User')->withPivot('created_at')->as('details');
    }
}

