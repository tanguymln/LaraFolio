<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public $timestamps = false;

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
