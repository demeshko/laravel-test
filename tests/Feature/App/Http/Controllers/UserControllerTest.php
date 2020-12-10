<?php

namespace App\Http\Controllers;

use Tests\TestCase;

class UserControllerTest extends TestCase
{

    public function testListUsers()
    {
        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function testCreateUser()
    {
        $response = $this->post('/users');

        $response->assertStatus(200);
    }

    public function testCreateUserTransaction()
    {
        $response = $this->post('/users/transaction');

        $response->assertStatus(200);
    }

    public function testDeleteUser()
    {
        $response = $this->delete('/users/{user}');

        $response->assertStatus(200);
    }

    public function testUpdateUser()
    {
        $response = $this->put('/users');

        $response->assertStatus(200);
    }

    public function testListLastCreatedUsers()
    {
        $response = $this->get('/users/list');

        $response->assertStatus(200);
    }
}
