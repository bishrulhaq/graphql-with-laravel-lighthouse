<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login
{
    /**
     * @param $_
     * @param array $args
     * @return mixed
     * @throws ValidationException
     */
    public function __invoke($_, array $args)
    {
        $user = User::where('email', $args['email'])->first();

        if (!$user || !Hash::check($args['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $user->createToken($args['device'])->plainTextToken;
    }
}
