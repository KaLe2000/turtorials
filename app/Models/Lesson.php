<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $status
 * @property \Illuminate\Support\Carbon $planned_date
 * @property int $user_id
 * @property int $course_id
 * @property int $city_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Image|null $image
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson wherePlannedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Course $course
 */
class Lesson extends Model
{
    use HasFactory;

    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';

    public function image(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Image::class, 'entity');
    }

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
