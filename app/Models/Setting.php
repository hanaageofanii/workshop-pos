<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $primaryKey = 'key';
    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }
}
