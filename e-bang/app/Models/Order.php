<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $primaryKey = 'order_id';

    public function item()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\Auth', 'id_user');
    }
}
