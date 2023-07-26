<?php

namespace App\Services\Auth;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Auth\TokenORM;
use App\Http\ORM\Auth\UserORM;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;

class AuthService
{

    public function login(string $login, string $password): mixed
    {
        $user = UserORM::isValidUser($login, $password);
        $token = $this->loginUser($user);

        return new UserResource($user, $token);
    }

    public function loginUser(User $user): string
    {
        $userToken = new UserToken();
        $userToken->user_id = $user->id;
        $userToken = TokenORM::save($userToken);

        return $userToken->token;
    }

    public function registration(array $credentials): User
    {
//        dd($credentials);
        $user = new User();
        $user->name = $credentials['name'] ?? null;
        $user->login = $credentials['login'] ?? null;
//        $user->setPasswordAttribute($credentials['password']);

        return UserORM::saveUser($user, $credentials['password']);
    }

    public function check(?string $token): ?User
    {
        $tokenUser = TokenORM::search($token);

        return $tokenUser ? UserORM::findActive($tokenUser->user_id) : null;
    }

    public function lifeToken(): void
    {
        $lifeToken = Carbon::now()->subHours(config('customAuth.lifeToken'));
        $activeToken = Carbon::now()->subHours(config('customAuth.activeToken'));

        // Видалення токенів, які були відредаговані більше року тому
        UserToken::query()
            ->where('active', 0)
            ->where('updated_at', '<', $lifeToken)
            ->delete();

        // Оновлення активності токенів, які були створені більше суток тому
        UserToken::query()
            ->where('active', 1)
            ->where('created_at', '<', $activeToken)
            ->update(['active' => 0]);
    }


}
