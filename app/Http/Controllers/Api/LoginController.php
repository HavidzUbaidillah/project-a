<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request, UserModel $userModel): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Invalid data',
                'errors' => $validator->errors(),
            ], 422);
        }
        $credentials = $request->only('username', 'password');

        if(!$token = auth()->guard('user')->attempt($credentials)) {
            return response()->json([
                'message' => 'Username or Password is wrong',
            ], 401);
        }
        return response()->json([
            'message' => 'Success',
            'user'    => auth()->guard('user')->user(),
            'token'   => $token
        ], 200);
    }

    public function logout(): JsonResponse
    {
        auth('user')->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
}
