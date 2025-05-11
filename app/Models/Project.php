<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
class Project extends Model
{

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
