<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AdminModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __invoke(Request $request, AdminModel $adminModel): JsonResponse
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

        if(!$token = auth()->guard('admin')->attempt($credentials)) {
            return response()->json([
                'message' => 'Username or Password is wrong',
            ], 401);
        }
        return response()->json([
            'message' => 'Success',
            'user'    => auth()->guard('admin')->user(),
            'token'   => $token
        ], 200);
    }
}
