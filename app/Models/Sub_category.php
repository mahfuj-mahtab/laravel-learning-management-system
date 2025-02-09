<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $fillable = ['category_id', 'name','image','created_by','status'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function courses(){
        return $this->hasMany(Course::class);
    }
}
