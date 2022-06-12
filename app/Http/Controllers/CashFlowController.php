<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use App\Process\CashFlowProcess;
use Illuminate\Http\Request;

class CashFlowController extends Controller
{
    public function create(User $user)
    {
        return view('cabinet.cashFlow.index', [
            'user' => $user,
        ]);
    }

    public function store(Request $request, User $user, CashFlowProcess $cashFlowProcess)
    {
        $cashFlowProcess->create($user, (float) $request->amount);

        return redirect(route('cabinet'));
    }
}
