<?php

namespace Database\Seeders;

use App\Domain\Enums\TransactionTypeEnum;
use App\Models\Transaction;
use App\Models\User;
use Database\Factories\TransactionFactory;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $users = User::factory(20)->create();
         User::factory(1)->create([
             'name' => 'Admin123',
             'email' => 'admin123@example.com',
             'password' => Hash::make('secret'),
             'is_admin' => true
         ]);
        $faker = Factory::create();
        $users->each(function (User $user) use ($faker){
            $user->transactions()->create([
                'type' => $faker->randomElement([
                    TransactionTypeEnum::CREDIT(),
                    TransactionTypeEnum::DEBIT()]),
                'amount' => (float)$faker->randomNumber(5),
            ]);
        });

    }
}
