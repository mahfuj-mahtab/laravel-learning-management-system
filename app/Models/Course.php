<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = ['title','description','instructor_id','price','status','image'];

    public function instructor(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
}
