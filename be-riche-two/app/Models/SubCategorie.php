<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategorie extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'product_count', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
