<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_date', 
        'reference', 
        'customer_id',
        'note',
        'attachment',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
