<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
   /**
    * @param  UserLoginRequest
    * @return UserResource
    */
    public function login(UserLoginRequest $request) 
    {
        if(!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'errors' => [
                    'email' => ['Invalid login credentials'],
                ]
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return (new UserResource($request->user()))->additional([
            'meta' => [
              'token' => $token
            ]
        ]);
    }

    /**
    * @param  Request $request
    * @return void
    */
    public function logout(Request $request) 
    {
        auth()->logout();
    }

}
