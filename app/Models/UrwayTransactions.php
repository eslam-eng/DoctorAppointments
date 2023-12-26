<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrwayTransactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'tran_id',
        'track_id',
        'track_type',
        'amount',
        'masked_pan'
    ];
}
