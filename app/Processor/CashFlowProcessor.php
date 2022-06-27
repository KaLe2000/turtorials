<?php

declare(strict_types=1);

namespace App\Processor;

use App\Models\CashFlow;
use App\Models\Lesson;
use App\Models\User;

class CashFlowProcessor
{
    /**
     * @throws \Throwable
     */
    public function create(
        User $user,
        float $amount,
        ?Lesson $lesson = null
    ): CashFlow {
        $flow = new CashFlow();
        $flow->user_id = $user->id;
        $flow->amount = $amount;
        $flow->status = CashFlow::STATUS_COMPLETED;
        if ($lesson !== null) {
            $flow->status = CashFlow::STATUS_RESERVED;
            $flow->lesson_id = $lesson->id;
        }

        $flow->save();

        return $flow;
    }
}
