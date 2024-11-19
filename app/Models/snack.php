<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class snack extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category', // e.g., snack or drink
        'description',
    ];
}
