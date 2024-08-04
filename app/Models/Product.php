<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';
    const GENDER_ALL = 'all';

    protected $fillable = [
        'name',
        'description',
        'price',
        'gender',
        'category_id',
        'sku',
        'stock',
        'size',
        'color',
        'material',
        'cover',
        'brand_id',
        'discount',
        'is_featured',
        'is_active'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
