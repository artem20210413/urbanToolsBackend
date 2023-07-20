<?php

namespace App\Services\Auth;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\Auth\TokenORM;
use App\Http\ORM\Auth\UserORM;
use App\Models\User;
use App\Models\UserToken;
use Carbon\Carbon;

class AuthService
{

    private UserORM $userORM;
    private TokenORM $tokenORM;

    public function __construct()
    {
        $this->userORM = new UserORM();
        $this->tokenORM = new TokenORM();
    }

    public function login(string $login, string $password): string
    {
        $user = $this->userORM->isValidUser($login, $password);

        return $this->loginUser($user);
    }

    public function loginUser(User $user): string
    {
        $userToken = $this->tokenORM->save(['userId' => $user->id]);

        return $userToken->token;
    }

    public function registration(array $credentials): User
    {
        return $this->userORM->save($credentials);
    }

    public function check(?string $token): ?User
    {
        $tokenUser = $this->tokenORM->search($token);

        return $tokenUser ? $this->userORM->find($tokenUser->user_id) : null;
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
