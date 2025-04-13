<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';

    // public $primaryKey = 'id';
    public $timestamps = true;
    public $fillable = [
        'category_id',
        'name',
        'price',
        'image',
        'stock',
        'isHot',
        'description',
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class); // belongsTo: đi tìm khóa ngoại
    }
}
