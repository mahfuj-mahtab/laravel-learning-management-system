<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Section;

class Video extends Model
{
    protected $fillable = ['title','url','duration','section_id','order'];

    public function section(): BelongsTo {
        return $this->belongsTo(Section::class,'section_id');
    }
   
}
