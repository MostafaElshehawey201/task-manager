<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_validation()
    {
        $data = [
            "name" => '',
            "email" => "not-an-email",
            "phone" => 1234,
            "password" => 12345,
            "password_confirmation" => 2155,
        ];
        $response = $this->postJson('api/v1/Auth/register', $data);
        $response->assertStatus(422)->assertJsonStructure([
            'success',
            'data',
            'errors' => [
                'name' => [],
                'email' => [],
                'phone' => [],
                'password' => []
            ]
        ]);
    }
}
