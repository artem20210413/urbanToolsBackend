<?php

namespace App\Http\ORM\Auth;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\iORM;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Schema\Blueprint;

class UserORM implements iORM
{
    public function __construct()
    {
    }

    public function isValidUser(string $login, string $password): User
    {

        $user = User::query()->where('login', $login)->first();

        if (!$user->active) {
            throw new ApiException('User not active', 0, 422);
        }

        if ($user && password_verify($password, $user->password)) {
            return $user;
        }

        throw new ApiException('Login or password is not correct', 0, 422);

    }

    public function passwordHashing(string $password): string
    {
        return bcrypt($password);
    }


    public function all(): Collection
    {
        return User::all();
    }

    public function find(int $id): ?User
    {
        $user = User::find($id);

        return $user && $user->active === 1 ? $user : null;
//        return $user ?? $user->acive === 1 ? $user : null;
    }

    public function save(array $form): User
    {
        $id = $form['id'] ?? null;
        $name = $form['name'] ?? null;
        $login = $form['login'] ?? null;
        $password = $form['password'] ?? null;
        $active = $form['active'] ?? null;

        if ($id) {
            $user = $this->find($id);
        } else {
            $user = new User();
        }

        $user->name = $name ?? $user->name;
        $user->login = $login ?? $user->login;
        $user->password = $password ?? $user->password;
        $user->active = $active ?? $user->active ?? 1;
        $user->save();

        return $user;
    }

    public function delete(int $id): void
    {
        $user = $this->find($id);
        $form = [
            'id' => $user->id,
            'active' => false
        ];
        $this->save($form);
    }
}
