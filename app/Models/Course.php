<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public const SUBJECT_MATH_ID = 1;
    public const SUBJECT_ENG_ID = 2;

    protected $fillable = ['name'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'entity');
    }
}
