<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Use HttpResponse Trait
     */
    use HttpResponses;

    public function login(LoginUserRequest $loginRequest)
    {
        $loginRequest->validated($loginRequest->all());

        if (!Auth::attempt($loginRequest->only(['email', 'password']))) {
            return $this->error(
                '',
                'Credentials do not match',
                401
            );
        }

        $user = User::where('email', $loginRequest->email)->first();

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
        ]);
    }

    /**
     * Register method for new usee
     *
     * @param StoreUserRequest $request
     * @return void
     */
    public function register(StoreUserRequest $request)
    {
        $request->validated($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $this->success([
            'user' => $user,
            'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken //Hash 256
        ]);
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();

        return $this->success([
            'message' => 'You have successfully been logout and your token has been deleted.',
        ]);
    }
}