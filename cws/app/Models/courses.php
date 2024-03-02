<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Relations\HasOne;

class courses extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function ccategories(): HasOne
    {
        return $this->HasOne(categories::class, 'id', 'category_id');
    }
}
