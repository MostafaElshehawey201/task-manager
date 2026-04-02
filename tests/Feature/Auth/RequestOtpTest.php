<?php

namespace Tests\Feature\Auth;


use Tests\TestCase;

class RequestOtpTest extends TestCase
{
    public function test_request_otp(){
        $data =[
            "login" => '',
        ];
        $response = $this->postJson('/api/v1/Auth/RequestOtp' , $data);
        $response->assertStatus(422)->assertJsonStructure([
            "success" ,
            "data" ,
            "errros" => [
                "login"
            ]
        ]);
    }

}
