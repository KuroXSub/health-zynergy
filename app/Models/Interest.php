<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Interest extends Model
{
    use HasFactory;

    protected $fillable = [
        'interest',
        'note'
    ];

    public function userpersonalization() 
    { 
        return $this->belongsToMany(UserPersonalization::class, 'user_personalizations'); 
    }

    public function article() 
    { 
        return $this->belongsToMany(Article::class, 'articles'); 
    }
}
