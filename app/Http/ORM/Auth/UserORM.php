<?php

namespace App\Http\ORM\Auth;

use App\Http\Controllers\Api\ApiException;
use App\Http\ORM\iORM;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserORM implements iORM
{

    static function isValidUser(string $login, string $password): User
    {

        $user = User::query()->where('login', $login)->first();

        if (!$user) {
            \App\Helpers\ExceptionHelper::loginOrPasswordIsNotCorrect();
        }

        if (!$user->active) {
            \App\Helpers\ExceptionHelper::userNotActive();
        }

        if (password_verify($password, $user->password)) {
            return $user;
        }
        \App\Helpers\ExceptionHelper::loginOrPasswordIsNotCorrect();
    }

    static function passwordHashing(string $password): string
    {
        return bcrypt($password);
    }


    static function all(): Collection
    {
        return User::all();
    }

    static function find(int $id): ?User
    {
        return User::find($id);
    }

    static function findActive(int $id): ?User
    {
        $user = User::find($id);

        return $user && $user->active === 1 ? $user : null;
    }

    /**
     * @param User $template
     * @return User
     */
    static function saveUser(User $template, string $password = null): User
    {
        $user = $template->id
            ? self::findActive($template->id)
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

    static function delete(int $id): void
    {
        $user = self::findActive($id);
        $user->delete();
    }

    static function deactivate(int $id): mixed
    {
        $user = self::find($id);
        $user->active = false;

        return self::save($user);
    }

    static function activate(int $id): mixed
    {
        $user = self::find($id);
        $user->active = true;

        return self::save($user);
    }

    static function save(mixed $template): mixed
    {
        $user = $template->id
            ? self::findActive($template->id)
            : new User();

        $user->name = $template->name ?? $user->name;
        $user->login = $template->login ?? $user->login;
        $user->password = $template->password ?? $user->password;
        $user->active = $template->active ?? $user->active ?? 1;
//        dd($user->toArray());
        $user->save();

        return $user;
    }

    public static function setUser(?User $user)
    {
        Session::put('user', $user);
    }

    /**
     * @return User
     */
    public static function getUser(): ?User
    {
        return Session::get('user');
    }

    public static function changePassword(string $newPassword, string $oldPassword)
    {
        $user = UserORM::getUser();
//        dd(bcrypt($newPassword));
        if (Hash::check($oldPassword, $user->password)) {
            $user->setPasswordAttribute($newPassword);
            $user->save();

            return $user;
        } else {
            throw new ApiException('The old password was entered incorrectly');
        }
    }
}
