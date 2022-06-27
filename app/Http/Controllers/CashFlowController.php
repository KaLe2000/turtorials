<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Processor\CashFlowProcessor;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    public function create(User $user)
    {
        return view('cabinet.cashFlow.index', [
            'user' => $user,
        ]);
    }

    public function store(Request $request, User $user, CashFlowProcessor $cashFlowProcess)
    {
        $cashFlowProcess->create($user, (float) $request->amount);

        return redirect(route('cabinet'));
    }
}
