<?php

declare(strict_types=1);

namespace App\Processor;

use App\Models\City;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserProcessor
{
    public function create(
        City $city,
        string $name,
        string $type,
        string $email,
        string $password
    ): User {
        $user = new User();
        $user->name = $name;
        $user->type = $type;
        $user->city_id = $city->id;
        $user->email = $email;
        $user->password = Hash::make($password);

        $user->save();

        return $user;
    }
}
