<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
class Service extends Model
{
    //
    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }
}
