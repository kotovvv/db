<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class General extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'image',
        'shop',
        'category',
        'same',
        'date',
        'other'
    ];

    public $timestamps = false;
}
