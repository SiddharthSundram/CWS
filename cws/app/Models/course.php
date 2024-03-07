<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use illuminate\Database\Eloquent\Relations\HasOne;


class Course extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function category(): HasOne
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
