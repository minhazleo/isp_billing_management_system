<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'price',
        'type',
        'payment_type',
        'invoice',
        'date',
        'note',
        'trans_type',
    ];
}
