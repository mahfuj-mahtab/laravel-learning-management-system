<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','image','created_by','status'];

    public function sub_categories(){
        return $this->hasMany(Sub_category::class);
    }
}
