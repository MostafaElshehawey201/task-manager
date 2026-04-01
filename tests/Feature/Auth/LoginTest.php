<?php

namespace Tests\Feature\Auth;


use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_validation(){
        $data =[
            "login" => '',
            "password" => '12340',
        ];
        $response = $this->postJson('/api/v1/Auth/login' , $data);
        $response->assertStatus(422)->assertJsonStructure([
            'success' ,
            'data' ,
            'errors' => [
                'login' => []
                , 'password' => []
            ]
        ]);
    }
}
