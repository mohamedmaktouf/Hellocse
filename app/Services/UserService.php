<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Models\User;
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
            if ($user instanceof User){
                $token =  $user->createToken('bearer')->plainTextToken;
                return $token;
            }

        }
        return null;
    }

}
