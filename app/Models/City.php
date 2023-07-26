<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class CaseItem
 * @package App\Models
 * @property integer id
 * @property string name
 * @property string alias
 * @property string description
 * @property double latitude
 * @property double longitude
 * @property string location
 * @property bool active
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class City extends Model
{
    use HasFactory;


    public function aliasGeneration()
    {
        $this->alias = aliasGeneration($this->name);
    }
}


