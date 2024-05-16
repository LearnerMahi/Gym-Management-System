<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'last_payment_date',
        'mobile_number',
        'address',
        'gender',
        'method', 
        'status',
    ];

    protected $dates = [
        'last_payment_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // If 'user_id' is not the default foreign key
    }
    protected $casts = [
        'last_payment_date' => 'datetime',
    ];

}
