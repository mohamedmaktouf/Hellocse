<?php

namespace App\Http\Controllers;

use App\DTOs\UserDTO;
use App\Http\Requests\LoginUserRequest;
use App\Services\UserService;
use Symfony\Component\HttpFoundation\Response;


class UserController extends Controller
{
    private UserService $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    /**
     * @param LoginUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginUserRequest $request)
    {
        $user = new UserDTO($request->email, $request->password);
        $result = $this->userService->login($user);
        if (!$result) {
            return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
        }
        return response()->json(['token' => $result], Response::HTTP_OK);
    }
}
