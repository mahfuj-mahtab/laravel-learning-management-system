<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class Enrollment extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'course_id', 'enrolled_at'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Course model (A course can have many enrollments)
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
