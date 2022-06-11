<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CashFlow
 *
 * @property int $id
 * @property string $amount
 * @property int $user_id
 * @property int|null $lesson_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow query()
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CashFlow whereUserId($value)
 * @mixin \Eloquent
 */
class CashFlow extends Model
{
    use HasFactory;
}
