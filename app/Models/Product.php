<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    protected $fillable = ['product', 'category', 'brand', 'SKU'];
}
