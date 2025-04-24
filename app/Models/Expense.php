<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'expense_id', 'date', 'note', 'type', 'amount', 'account', 'remarks'
    ];
    
    
}
