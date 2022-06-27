<?php

declare(strict_types=1);

use App\Models\Lesson;
use App\Models\LessonStudent;

return [
    Lesson::STATUS_OPEN => 'открыт',
    Lesson::STATUS_CLOSED => 'закрыт',

    LessonStudent::STATUS_INITIAL => 'урок не начался',
    LessonStudent::STATUS_IN_PROCESS => 'урок в процессе',
    LessonStudent::STATUS_COMPLETED => 'урок завершен',
];
