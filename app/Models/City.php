<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public const CITY_KEMEROVO_ID = 1;
    public const CITY_NOVOSIBIRSK_ID = 2;

    protected $fillable = ['name', 'raw'];

    protected $casts = [
        'raw' => 'array',
    ];
}
