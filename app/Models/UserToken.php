<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class UserToken
 * @package App\Models
 * @property integer id
 * @property int user_id
 * @property string token
 * @property string created_at
 * @property string updated_at
 * @property bool active
 */
class UserToken extends Model
{
    use HasFactory;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
