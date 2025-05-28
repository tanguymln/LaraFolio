<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

#[ApiResource]
class Project extends Model
{
    use Searchable;
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
