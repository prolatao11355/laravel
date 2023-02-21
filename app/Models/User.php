<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //リレーションを設定
    // public function posts(){
    //     return $this->hasMany('App\Models\Post');
    // }
    // public function diaries(){
    //     return $this->hasMany('App\Models\Diary');
    // }
    // public function scopeRecommend($query,$self_id){
    //     return $query->where('id', '!=', $self_id)->inRandomOrder()->limit(3);
    // }
    // public function user_posts(){
    //     return $this->hasMany('App\Models\Post')->latest()->limit(10);
    // }
    // public function likes(){
    //     return $this->hasMany('App\Models\Like');
    // }
    // public function likePosts(){
    //     return $this->belongsToMany('App\Models\Post', 'likes');
    // }

    // public function follows(){
    //     return $this->hasMany('App\Models\Follow');
    // }
    // public function follow_users(){
    //     return $this->belongsToMany('App\Models\User', 'follows','user_id','follow_id');
    // }
    // public function followers(){
    //     return $this->belongsToMany('App\Models\User', 'follows','follow_id','user_id');
    // }
    // public function isFollowing($user){
    //     $result = $this->follow_users->pluck('id')->contains($user->id);
    //     return $result;
    // }
        
    public function items(){
        return $this->hasMany('App\Models\Item')->latest();
    }
    public function scopeRecommend($query,$self_id){
        return $query->where('id','!=',$self_id)->latest();
    }
    public function likes(){
        return $this->hasMany('App\Models\Likes');
    }
    public function likeItems(){
        return $this->belongsToMany('App\Models\Item','likes');
    }

    public function orders(){
        return $this->hasMany('App\Models\Orders');
    }
    public function orderItems(){
        return $this->belongsToMany('App\Models\Item','orders');
    }
    public function isOrdered($item){
        $this_item_ids=$this->orderItems->pluck('id');
        $result=$this_item_ids->contains($item->id);
        return $result;
    }
}
