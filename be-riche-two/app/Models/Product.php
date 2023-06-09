<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_description',
        'price',
        'quantity',
        'category_id',
        'subcategory_id',
        'user_id',
        'product_image',
        'slug',
    ];


    public function category()
{
    return $this->belongsTo(Category::class);
}
public function reviews()
{
    return $this->hasMany(Review::class);
}

    public function subcategory()
    {
        return $this->belongsTo(SubCategorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
{
    return $this->hasMany(Order::class);
}
}
