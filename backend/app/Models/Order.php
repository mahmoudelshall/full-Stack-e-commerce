<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date', 'status', 'total_amount'];

    // relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // OrderProduct
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
    // payment
    public function payments()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }
}
