<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPersonalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];

    public function diseases() 
    { 
        return $this->belongsToMany(Disease::class, 'disease_user_personalizations'); 
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'interest_user_personalizations');
    }

    public function allergies()
    {
        return $this->belongsToMany(Allergy::class, 'allergy_user_personalizations');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
