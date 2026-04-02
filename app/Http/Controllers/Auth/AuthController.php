<?php

namespace App\Http\Controllers\Auth;

use App\DTO\Auth\LoginDTO;
use App\DTO\Auth\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\RequestOtpRequest;
use App\Interfaces\Auth\LoginServiceInterface;
use App\Interfaces\Auth\RegisterServiceInterface;
use App\Interfaces\Auth\RequestOtpServiceInterface;
use App\Trait\Auth\ApiResponse;
use League\Config\Exception\ValidationException;

class AuthController extends Controller
{
    use ApiResponse;
    public function __construct(
        protected RegisterServiceInterface $register_service_interface,
        protected LoginServiceInterface $login_service_interface,
        protected RequestOtpServiceInterface $request_otp_service_interface,
    ) {}
    public function register(RegisterRequest $registerRequest)
    {
        try {
            $validation = $registerRequest->validated();
            $RegisterDTO = new RegisterDTO($validation);
            $user = $this->register_service_interface->register($RegisterDTO);
            return $this->success($user, 201);
        } catch (ValidationException $e) {
            return $this->error($e->getMessages(), 422);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function login(LoginRequest $loginRequest)
    {
        try {
            $validation = $loginRequest->validated();
            $LoginDTO = new LoginDTO($validation);
            $token = $this->login_service_interface->login($LoginDTO);
            return $this->success($token, 200);
        } catch (ValidationException $e) {
            return $this->error($e->getMessages(), 404);
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500);
        }
    }

    public function RequestOtp(RequestOtpRequest $RequestOtpRequest){
        $validation = $RequestOtpRequest->validated();
        $requestOtpDTO = new RequestOtpRequest($validation);
        $this->request_otp_service_interface->RequestOtp($requestOtpDTO);
    }
}
