<?php

declare(strict_types=1);

namespace App\Process;

use App\Models\CashFlow;
use App\Models\Lesson;
use App\Models\User;

class CashFlowProcess
{
    /**
     * @throws \Throwable
     */
    public function create(
        User $user,
        float $amount,
        ?Lesson $lesson = null
    ): CashFlow {
        try {
            \DB::beginTransaction();

            $flow = new CashFlow();
            $flow->user_id = $user->id;
            $flow->amount = $amount;
            $flow->lesson_id = $lesson?->id;
            $flow->save();

            $user->balance += $amount;
            $user->save();

            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollBack();

            throw $e;
        }

        return $flow;
    }
}
