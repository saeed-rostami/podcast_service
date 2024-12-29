<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
    use SoftDeletes;

    protected $table = 'likes';
    protected $guarded = ['id'];

    public function item(): MorphTo
    {
        return $this->morphTo('item');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
