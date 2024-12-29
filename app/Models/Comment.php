<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = ['id'];


    public function item(): MorphTo
    {
        return $this->morphTo('item');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function isMine(): bool
    {
        if (!Auth::check()) {
            return false;
        }

        return $this->user_id == Auth::id();
    }
}
