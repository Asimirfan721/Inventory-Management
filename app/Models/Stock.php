<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'purchase_order',
        'date',
        'no_of_days',
        'supplier',
        'total',
    ];
}
