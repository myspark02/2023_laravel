<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // role_user 테이블에서 role_id가 roles 테이블의 id와 같은 레코드들을 찾고
    // 그 레코드들의 user_id 값을 id 값으로 가지는 레코드들을 users 테이블에서 찾는다. 
    public function users() {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id', 'id', 'id')->withTimestamps();
    }

}
