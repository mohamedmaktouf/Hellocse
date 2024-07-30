<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileNotFoundException extends Exception
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render(Request $request) : JsonResponse
    {
        return response()->json(['error' => 'Profile not found'], 404);
    }
}
