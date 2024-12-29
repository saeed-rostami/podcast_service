<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FollowedPodcast extends Model
{
    use SoftDeletes;

    protected $table = 'followed_podcasts';
    protected $guarded = ['id'];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Podcast::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
