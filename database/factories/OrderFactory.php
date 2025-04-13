<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>User::all()->random()->id,
            'total_price'=>$this->faker->randomFloat(2, 1, 100),
            'table'=>$this->faker->randomElement(['Chờ xử lý', 'Đang xử lý','Đã giao hàng','Đã nhận hàng','Đã hủy']),
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime()
        ];
    }
}
