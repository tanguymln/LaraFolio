<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    //
    protected $fillable = ['key', 'value'];

    protected $casts = [
        'value' => 'string',
    ];

    public static function get(string $key): ?string
    {
        return static::where('key', $key)->value('value');
    }
}
