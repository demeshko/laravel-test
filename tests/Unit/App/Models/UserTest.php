<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;


class UserTest extends TestCase
{
    use RefreshDatabase;
//    /** @test */
//    public function it_has_transactions()
//    {
//        $transaction = factory('App\Transaction')->create();
//        $this->assertInstanceOf('App\User', $transaction->owner);
//    }

    /** @test */
    public function can_get_admin_user() {

        $user = User::create([
            'name' => 'TestUser',
            'email' => 'user@example.com',
            'password' => Hash::make('test_password'),
            'is_admin' => true
        ]);

        $this->assertEquals(true, $user->is_admin);
    }

    /** @test */
    public function can_get_non_privileged_user()
    {

        $user = User::create([
            'name' => 'TestUser',
            'email' => 'user@example.com',
            'password' => Hash::make('test_password'),
        ]);

        $this->assertEquals(false, $user->is_admin);
    }
}
