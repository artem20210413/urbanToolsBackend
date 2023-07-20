<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class CaseItem
 * @package App\Models
 * @property integer id
 * @property integer cluster_id
 * @property integer city_id
 * @property string name
 * @property string description
 * @property string coordinates
 * @property string coordinate_name
 * @property string image_main_paths
 * @property bool active
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Cases extends Model
{
    use HasFactory;

    public function cluster(): BelongsTo
    {
        return $this->belongsTo(Cluster::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(CaseImage::class);
    }
}
