<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;


class Course extends Model
{
    use HasFactory;
    protected $fillable = ['features','name', 'duration', 'instructor', 'fees', 'discount_fees', 'lang', 'category_id', 'featured_image', 'description', 'status', 'course_slug'];
    
    public function category(): HasOne
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }


    public function setCourseSlugAttribute($value)
    {
        $this->attributes['course_slug'] = Str::slug($value);
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
