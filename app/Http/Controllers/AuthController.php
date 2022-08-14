<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterREquest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterREquest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
        ]);

        return response(
            new UserResource($user),
            Response::HTTP_CREATED
        );
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response([
                'error' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $jwt = $request->user()->createToken('jwt')->plainTextToken;

        $cookie = cookie('jwt', $jwt, 40 * 24 );

        return response([
            'jwt' => $jwt
        ])->withCookie($cookie);
    }

    public function user(Request $request)
    {
        $user = $request->user();
        return new UserResource($user->load('role'));
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response([
            'message' => 'success'
        ])->withCookie($cookie);
    }

    public function updateInfo(Request $request)
    {
        $user = $request->user();
        $user->update($request->only('first_name', 'last_name', 'email', 'role_id'));

        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }
}
