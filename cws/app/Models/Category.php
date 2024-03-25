<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['cat_title', 'cat_description', 'slug'];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
