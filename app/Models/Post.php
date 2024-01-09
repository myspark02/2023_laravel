<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; 

    // create 메서드로 레코드를 생성할 때 명시할 수 있는 칼럼 이름들
    // 대량 할당을 사용할 때, 개발자가 허용하는 칼럼 값만 취해서 레코드로 생성하기 위해서
    // 예를 들어, request에 created_at, updated_at 값이 있어도 그에 해당하는
    // 칼럼이 posts 테이블에 존재하지만, 그 값은 취하지 않고 레코드를 생성한다. 
    protected $fillable = ['title', 'content', 'user_id']; // 화이트 리스트

    // protected $guarded = ['created_at', 'updated_at']; // 블랙 리스트

    protected $with = ['ratings'];  // Post 모델은 기본으로 연계된 Ratings를 함께 즉시 적재한다.

    public function comments() {
        // return $this->hasMany(Comment::class, 'post_id', 'id');
        return $this->hasMany(Comment::class);
    }

    public function latestComment() {
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    public function oldestComment() {
        return $this->hasOne(Comment::class)->oldestOfMany();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
