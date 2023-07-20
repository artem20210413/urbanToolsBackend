<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $service)
    {

        try {
            $credentials = $request->only('login', 'password');
            $token = $service->login(...$credentials);

            return success(['token' => $token]);
        } catch (\Exception $e) {

            return error($e);
        }
    }

    public function logout()
    {

    }

    public function registration(RegistrationRequest $request, AuthService $service) //TODO Валидация
    {
        try {
            $credentials = $request->only('name', 'login', 'password');
            $service->registration($credentials);

            return success();
        } catch (\Exception $e) {

            return error($e);
        }
    }
}
