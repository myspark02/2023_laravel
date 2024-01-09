<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    public function post() {
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['user_id', 'rate', 'post_id'];
}
