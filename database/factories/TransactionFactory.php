<?php

namespace Database\Factories;

use App\Domain\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'type' => $this->faker->randomElement([
                TransactionTypeEnum::CREDIT(),
                TransactionTypeEnum::DEBIT()]),
            'amount' => (float) $this->faker->randomNumber(5),
        ];
    }
}
