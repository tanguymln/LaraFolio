<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

#[ApiResource]
class Service extends Model
{
    //
    use Searchable;
    public function quotes()
    {
        return $this->belongsToMany(Quote::class);
    }
}
