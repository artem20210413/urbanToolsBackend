<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Urban\CityORM;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\City;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request, AuthService $service)
    {

        try {
            $credentials = $request->only('login', 'password');
            $user = $service->login(...$credentials);

            return success($user);
        } catch (ApiException $e) {

            return error($e);
        }
    }

//TODO добавить кастомный Request
    public function changePassword(Request $request, AuthService $service)
    {
        try {
            $credentials = $request->only( 'password', 'oldPassword');
            $user = $service->changePassword(...$credentials);

            return success($user);
        } catch (ApiException $e) {

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
        } catch (ApiException $e) {

            return error($e);
        }
    }
}
