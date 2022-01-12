<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buffer extends Model
{
    use HasFactory;
    protected $table = 'order_buffer';
    protected $primaryKey = 'obuffer_id';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
