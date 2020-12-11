<?php

namespace App\Http\Controllers;

use App\Domain\Enums\TransactionTypeEnum;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create([
            'is_admin' => true
        ]);
        $this->seed();
    }

    public function testCanShowUser()
    {
        $user = User::factory()->create([
            'name' => 'TestName123',
            'email' => 'example123@example.com',
            'is_admin' => true
        ]);
        $response = $this->get(route('users.show', $user->id));
        $response->assertStatus(200)
            ->assertJson([
                'name' => 'TestName123',
                'email' => 'example123@example.com',
                'is_admin' => true,
        ]);
    }

    public function testCanCreateUserTransaction()
    {
        $this->actingAs($this->user);
        $response = $this->postJson(route('users.create.transaction', $this->user), [
            'type' => TransactionTypeEnum::CREDIT(),
            'amount' => (float) 1500,
        ]);
        $response->assertStatus(200)->assertJson([
            "type" => "credit",
            "amount" => 1500
        ]);
    }

    public function testCanDeleteUser()
    {
        $response = $this->delete(route('users.delete', $this->user->id));
        $response->assertStatus(200);
    }

    public function testCanUpdateUser()
    {
        $user = User::factory()->create([
            'name' => 'TestName123',
            'email' => 'example123@example.com',
            'is_admin' => true
        ]);
        $response = $this->putJson(route('users.update', $this->user->id));
        $response->assertStatus(200);
    }

    public function testCanListLastCreatedUsersWithTransactions()
    {
        $response = $this->get(route('users.list.transaction'));
        $response->assertStatus(200);
    }
}
