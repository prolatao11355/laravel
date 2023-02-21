<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','description','category_id','price','image','situation'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function category(){
        return $this->belongsTo('App\Models\Categories');
    }
    public function likes(){
        return $this->hasMany('App\Models\Likes');
    }
    public function likeUsers(){
        return $this->belongsToMany('App\Models\User','likes');
    }
    public function isLikeBy($user){
        $this_user_ids=$this->likeUsers->pluck('id');
        $result=$this_user_ids->contains($user->id);
        return $result;
    }
}
