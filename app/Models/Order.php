<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'payment_method',
        'table',
        'full_name',
        'phone',
        'address',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

}
