<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Company extends Model
{
    use HasFactory;

    protected $fillable = ['logo', 'name', 'currency_id'];

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
