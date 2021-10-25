<?php

namespace App\Models;

use App\Models\User;
use Database\Factories\TransactionFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;


class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_transactions()
    {
        $user = User::factory()->create();
        $transaction = Transaction::factory()->make(['user_id' => $user->id]);
        $user->transactions()->save($transaction);
        $this->assertTrue($user->transactions->contains($transaction));
        $this->assertInstanceOf(Collection::class, $user->transactions);
    }

    /** @test */
    public function can_get_admin_user() {

        $user = User::factory()->create(['is_admin' => true]);

        $this->assertEquals(true, $user->is_admin);
    }

    /** @test */
    public function can_get_non_privileged_user()
    {

        $user = User::factory()->create(['is_admin' => false]);

        $this->assertEquals(false, $user->is_admin);
    }
}
