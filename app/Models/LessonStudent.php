<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LessonStudent
 *
 * @property int $id
 * @property int $lesson_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent query()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonStudent whereUserId($value)
 * @mixin \Eloquent
 */
class LessonStudent extends Model
{
    use HasFactory;
}
