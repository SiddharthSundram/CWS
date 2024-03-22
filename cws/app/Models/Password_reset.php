<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    use HasFactory;
    public $table = 'password_resets';
    public $timestamps = false;
    protected $primaryKey = 'email';
    protected $fillable = [
        'email',
        'token',
        'created_at',
    ];
}
