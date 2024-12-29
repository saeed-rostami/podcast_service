<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;

    protected $table = 'episodes';
    protected $guarded = ['id'];

    public function podcast(): BelongsTo
    {
        return $this->belongsTo(Podcast::class, 'podcast_id');
    }
}
