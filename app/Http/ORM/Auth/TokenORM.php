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

    public function findActive(int $id)
    {
        return UserToken::query()->where('id', $id)->where('active', 1)->first();
    }

    public function search(string $token)//: ?UserToken
    {
        return UserToken::query()->where('token', $token)->where('active', 1)->first();
    }

    /**
     * @param UserToken $template
     * @return UserToken|null
     */

    public function save(mixed $template): ?UserToken
    {
        if (!$template->user_id) {
            return null;
        }

        $userToken = new UserToken();
        $userToken->user_id = $template->user_id ?? $userToken->user_id;
        $userToken->token = $template->token ?? $userToken->token ?? Session::getId();
        $userToken->active = $template->active ?? $userToken->active ?? true;
        $userToken->save();

        return $userToken;

    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    public function deactivate(int $id): mixed
    {
        $token = $this->find($id);
        $token->active = false;

        return $this->save($token);
    }

    public function activate(int $id): mixed
    {
        $token = $this->find($id);
        $token->active = true;

        return $this->save($token);
    }
}
