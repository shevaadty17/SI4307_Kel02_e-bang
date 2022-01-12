<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_item';
    protected $primaryKey = 'oitem_id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
