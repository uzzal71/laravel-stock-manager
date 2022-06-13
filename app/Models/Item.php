<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 
        'item_code', 
        'item_barcode', 
        'category_id', 
        'brand_id', 
        'item_quantity', 
        'item_unit', 
        'item_alert_quantity', 
        'item_image', 
    ];
}
