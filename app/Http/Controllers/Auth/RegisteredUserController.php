<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreUserRequest;
use App\Models\User;
use App\Processor\CityProcessor;
use App\Processor\UserProcessor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('auth.register', [
            'types' => [
                User::TYPE_STUDENT,
                User::TYPE_TEACHER,
            ],
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param StoreUserRequest $request
     * @param UserProcessor $userProcess
     * @param CityProcessor $cityProcess
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request, UserProcessor $userProcess, CityProcessor $cityProcess): \Illuminate\Http\RedirectResponse
    {
        $user = $userProcess->create(
            $cityProcess->findCityByIp(),
            $request->getName(),
            $request->getType(),
            $request->getEmail(),
            $request->getPassword(),
        );

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
