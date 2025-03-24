<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id'=>Order::all()->random()->id,
            'payment_method'=>$this->faker->randomElement(['Chuyển khoản','Thanh toán khi nhận hàng']),
            'status'=>$this->faker->randomElement(['Đang chờ thanh toán','Đã thanh toán','Thanh toán thất bại']),
            'tongTien'=>$this->faker->randomFloat(2, 1, 100),
            'created_at'=>$this->faker->dateTime(),
            'updated_at'=>$this->faker->dateTime()
        ];
    }
}
