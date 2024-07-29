<?php

namespace App\Services;

use App\DTOs\UserDTO;
use Illuminate\Support\Facades\Auth;

class UserService
{

    /**
     * @param UserDTO $userDTO
     * @return string|null
     */
    public function login(UserDTO $userDTO) : ?string
    {
        if(Auth::attempt($userDTO->toArray())){
            $user = Auth::user();
            return  $user->createToken('MyApp')->plainTextToken;
        }
        return null;
    }

}
