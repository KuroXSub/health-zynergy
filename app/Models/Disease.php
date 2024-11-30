<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $fillable = [
        'disease',
        'note',
    ];

    public function userpersonalization() 
    { 
        return $this->belongsToMany(UserPersonalization::class, 'user_personalizations'); 
    }
}
