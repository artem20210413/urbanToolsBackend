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

        if (!$user) {
            throw new ApiException('Login or password is not correct', 0, 422);
        }

        if (!$user->active) {
            throw new ApiException('User not active', 0, 422);
        }

        if (password_verify($password, $user->password)) {
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
        return User::find($id);
    }

    public function findActive(int $id): ?User
    {
        $user = User::find($id);

        return $user && $user->active === 1 ? $user : null;
    }

    /**
     * @param User $template
     * @return User
     */
    public function saveUser(User $template, string $password = null): User
    {
        $user = $template->id
            ? $this->findActive($template->id)
            : new User();

        $user->name = $template->name ?? $user->name;
        $user->login = $template->login ?? $user->login;
        if ($password) {
            $user->setPasswordAttribute($password);
        }
        $user->active = $template->active ?? $user->active ?? 1;
        $user->save();

        return $user;
    }

    public function delete(int $id): void
    {
        $user = $this->findActive($id);
        $user->delete();
    }

    public function deactivate(int $id): mixed
    {
        $user = $this->find($id);
        $user->active = false;

        return $this->save($user);
    }

    public function activate(int $id): mixed
    {
        $user = $this->find($id);
        $user->active = true;

        return $this->save($user);
    }

    public function save(mixed $template): mixed
    {
        $user = $template->id
            ? $this->findActive($template->id)
            : new User();

        $user->name = $template->name ?? $user->name;
        $user->login = $template->login ?? $user->login;
        $user->password = $template->password ?? $user->password;
        $user->active = $template->active ?? $user->active ?? 1;
//        dd($user->toArray());
        $user->save();

        return $user;
    }
}
