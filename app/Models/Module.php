<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['title','details','course_id','instructor_id','unlock_date','order','status'];

    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function instructor(){
        return $this->belongsTo(User::class,'instructor_id');
    }
    public function sections()
    {
        return $this->hasMany(Section::class)->orderBy('order');;
    }
}
