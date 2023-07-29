<?php

namespace App\Helpers;

use App\Http\Controllers\Api\ApiException;
use Illuminate\Database\Eloquent\Model;

class ExceptionHelper
{
    /**
     * @return void
     * @throws ApiException
     */

    public static function actionIsNotAvailable(string $active): void
    {
        throw new ApiException("Action is not available: '$active'. Valid only: act, dec", 0, 422);
    }


    /**
     * @param string $id
     * @param string $name
     * @return void
     * @throws ApiException
     */
    public static function objectNotFound(string $id, string $name): void
    {
        throw new ApiException("$name id:$id not found", 0, 404);
    }


    /** LOGIN ORM */
    /**
     * @return void
     * @throws ApiException
     */
    public static function loginOrPasswordIsNotCorrect(): void
    {
        throw new ApiException('Login or password is not correct', 0, 422);
    }

    /**
     * @return void
     * @throws ApiException
     */
    public static function userNotActive(): void
    {
        throw new ApiException('User not active', 0, 422);
    }
}
