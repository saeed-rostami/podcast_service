<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Podcast extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'podcasts';
    protected $guarded = ['id'];

    const ACCESS_LEVELS = ['PUBLIC' => 1 , 'PRIVATE' => 2, 'VIP' => 3];

    public static function getAccessLevelKey($value) {
        $key = array_search($value, self::ACCESS_LEVELS);
        return $key !== false ? $key : null; // Return null if not found
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}
