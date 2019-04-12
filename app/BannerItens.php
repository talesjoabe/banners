<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerItens extends Model
{
    protected $fillable = [
       'name', 'banner_id'
    ]; 

    public function banner(): BelongsTo
    {
        return $this->belongsTo(Banner::class, 'banner_id');
    }
}
