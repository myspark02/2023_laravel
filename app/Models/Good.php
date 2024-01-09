<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Good extends Model
{
    use HasFactory;
    
    protected $fillable = ['category', 'name'];

    public function users() {
        // return $this->belongsToMany(User::class)->withPivot(['ordered_date', 'amount']);
        return $this->belongsToMany(User::class)->as('order')->withPivot(['ordered_date', 'amount']);
    }
}