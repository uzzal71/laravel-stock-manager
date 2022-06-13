<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOutDetail extends Model
{
    use HasFactory;

    protected $fillable = ['check_out_id', 'item_id', 'quantity'];
}
