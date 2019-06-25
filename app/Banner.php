<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'name'
    ];

    public function BannerItens(): BelongsToMany
    {
        return $this->belongsToMany(BannerItens::class);
    }
}
