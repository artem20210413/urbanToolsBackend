<?php

namespace App\Models;

use App\Http\Resources\CaseResource;
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
 * @property string alias
 * @property string description
 * @property double latitude // широта
 * @property double longitude // долгота
 * @property string location
 * @property string image_main_path
 * @property bool active
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Cases extends Model
{
    use HasFactory;

    public function aliasGeneration()
    {
        $this->alias = aliasGeneration($this->name);
    }

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
        return $this->hasMany(CaseImage::class, 'case_id' , 'id');
    }

    public function saveSecondImg(string $path): CaseImage
    {
        $img = new CaseImage();
        $img->case_id = $this->id;
        $img->image_paths = $path;
        $img->save();

        return $img;
    }

    public function dropSecondImg(): void
    {
        $images = CaseImage::query()->where('case_id', $this->id)->get();
        foreach ($images as $image) {
            $image->delete();
        }
    }
}
