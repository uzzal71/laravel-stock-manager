<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckInDetail extends Model
{
    use HasFactory;

    protected $fillable = ['check_in_id', 'item_id', 'quantity'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
