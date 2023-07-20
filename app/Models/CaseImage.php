<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class CaseImage
 * @package App\Models
 * @property integer id
 * @property integer case_id
 * @property string image_paths
 * @property string description
 * @property bool active
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class CaseImage extends Model
{
    use HasFactory;
}
