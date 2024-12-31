<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class EpisodeFiles extends Model
{
    use SoftDeletes;

    protected $table = 'episodes';
    protected $guarded = ['id'];
    protected $casts = ['metas' => 'json'];
    public function file() : HasOne
    {
        return $this->hasOne(EpisodeFiles::class);
    }
}
