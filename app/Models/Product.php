<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'tags',
        'categories_id',
    ];

    // menambahkan relasi pada galleries
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    // menambahkan kebalikan dari relasi pada category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id', 'id');
    }
}
