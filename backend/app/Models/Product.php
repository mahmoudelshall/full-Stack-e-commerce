<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'manufacturer',
        'status',
        'category_id'
    ];

    // relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // OrderProduct
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }
    //Review
    public function reviews()
    {
       // return $this->hasMany(Review::class,'product_id','id')->where('approved',1)->avg('rating');
       // return $this->hasMany(Review::class,'product_id','id')->where('approved',1)->orderByDesc('created_at');
        return $this->hasMany(Review::class);
    }
}
