<?php

namespace App\Models;

use App\Http\Traits\CanBeFiltered;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'paid_amount',
        'currency',
        'user_email',
        'status',
        'payment_date',
        'parent_identification'
    ];


    public $timestamps = false;

}
