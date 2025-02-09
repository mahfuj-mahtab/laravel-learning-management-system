<?php



namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $fillable = ['title','short_description','description','banner_image','type','instructor_id','sub_category_id','price','discount_price','status'];

    public function instructor(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }
    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');;
    }
}
