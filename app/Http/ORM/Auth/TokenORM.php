<?php

namespace App\Http\ORM\Auth;

use App\Http\ORM\iORM;
use App\Models\User;
use App\Models\UserToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class TokenORM implements iORM
{

    public function all(): Collection
    {
        return UserToken::all();
    }

    public function find(int $id): ?UserToken
    {
        return UserToken::find($id);
    }

    public function search(string $token)//: ?UserToken
    {
        return UserToken::query()->where('token', $token)->where('active', 1)->first();
    }


    public function save(array $form): ?UserToken
    {
        $userId = $form['userId'] ?? null;
        $active = $form['active'] ?? null;

        if (!$userId) {
            return null;
        }

        $userToken = new UserToken();
        $userToken->user_id = $userId;
        $userToken->token = Session::getId();
        $userToken->active = $active ?? true;
        $userToken->save();

        return $userToken;

    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

}
