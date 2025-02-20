<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Section extends Model
{
    protected $fillable = ['title','details','course_id','module_id','order','status'];

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class,'course_id');
    }
    public function videos()
    {
        return $this->hasMany(Video::class)->orderBy('order');;
    }
}
