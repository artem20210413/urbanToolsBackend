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
 * @property string description
 * @property bool active
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Cluster extends Model
{
    use HasFactory;
}
