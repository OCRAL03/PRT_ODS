<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'age',
        'height',
        'weight',
        'gender',
        'occupation',
        'meals_per_day',
        'fruits_vegetables',
        'high_fat_sugar',
        'water_intake',
        'exercise_frequency',
        'exercise_time',
        'sleep_hours',
        'sleep_quality',
        'important_factors',
        'health_recommendations',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}