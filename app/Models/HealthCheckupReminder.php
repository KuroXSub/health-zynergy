<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCheckupReminder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'checkup_name',
        'next_checkup_date',
        'is_reminded',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
