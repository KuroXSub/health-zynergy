<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allergy extends Model
{
    use HasFactory;

    protected $fillable = [
        'allergy',
        'note'
    ];

    public function userapersonalization() 
    { 
        return $this->belongsToMany(UserPersonalization::class, 'user_personalizations'); 
    }
}
