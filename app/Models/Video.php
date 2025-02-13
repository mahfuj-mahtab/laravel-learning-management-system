<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Section;

class Video extends Model
{
    protected $fillable = ['title','details','embed_link','video_link','duration','section_id','order','course_id','status','type'];

    public function section(): BelongsTo {
        return $this->belongsTo(Section::class,'section_id');
    }
   
}
