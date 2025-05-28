<?php

namespace App\Models;

use ApiPlatform\Metadata\ApiResource;
use Illuminate\Database\Eloquent\Model;

#[ApiResource]
class Quote extends Model
{
    //

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'message'];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
