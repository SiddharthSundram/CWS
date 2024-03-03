<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasOne;


class course extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function category(): HasOne
    {
        return $this->HasOne(Category::class, 'id', 'category_id');
    }
}
