<?php

namespace App\Models;

use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model
{
    use HasFactory;

    protected $table= 'products';
    protected $fillable=[
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'tranding',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    function productImage(){
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
}
