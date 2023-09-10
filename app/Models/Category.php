<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table='category';
    protected $fillable=[
        'name',
        'slug',
        'description',
        'image',
        'meta-title',
        'meta-keyword',
        'meta-description',
        'status',
    ];

    function product(){
        return $this->hasMany(Products::class, 'category_id', 'id');
    }
}
