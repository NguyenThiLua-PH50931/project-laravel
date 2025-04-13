<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['name'];
    public $timestamps = true;

    // Thiết lập mối quan hệ để lấy category_name
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    
}
