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
        'password' => 'hashed',
    ];

    public function phone() {
        return $this->hasOne(Phone::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function posts() {
        return $this->hasMany(Post::class);
    }

    // public function latestPost() {
    //     // 이 user가 작성한 posts 중에 id 값이 가장 큰 놈 
    //     return $this->hasOne(Post::class)->latestOfMany();
    // }

    public function latestPost() {
        return $this->posts()->one()->ofMany('id', 'max');
    }

    public function oldestPost() { 
        // 이 user가 작성한 posts 중에 id 값이 가장 작은 놈 
        return $this->hasOne(Post::class)->oldestOfMany();
    }

    // 내가 작성한 게시글의 모든 댓글 가져오기
    // users --- posts --- comments
    //           user_id, post_id, id, id
    public function postcomments() {
        //return $this->hasManyThrough(Comment::class, Post::class);
        return $this->hasManyThrough(Comment::class, Post::class, 'user_id', 'post_id', 'id', 'id');
    }

    // Role과의 N:M 관계를 정의하는 메서드를 정의하자.
    public function roles(){
        //return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id', 'id', 'id')->withTimestamps();
        return $this->belongsToMany(Role::class)->withTimestamps()->withPivot(['active']);
    }

    public function goods() {
        // return $this->belongsToMany(Good::class)->withPivot(['ordered_date', 'amount']);
        return $this->belongsToMany(Good::class)->as('order')->withPivot(['ordered_date', 'amount']);
    }
}
