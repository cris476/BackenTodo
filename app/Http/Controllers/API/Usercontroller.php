<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
// use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Usercontroller extends Controller
{

    public function register(StoreUserRequest  $request)
    {

        $userExist = User::where("email", $request->email)->first();

        if ($userExist) {
            return response()->json([
                'message' => 'El correo electrónico ya está registrado.',
                'validation' => false
            ], 422);
        }

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        return response()->json(["message" => "Usuario registrado", "validation" => true]);
    }

    public function login(LoginRequest $request)
    {

        $userExist =  User::where("email", $request->email)->first();

        if (!$userExist || !Hash::check($request->password, $userExist->password)) {
            throw ValidationException::withMessages([
                'message' => ['Información incorrecta'],
            ], 422);
        }


        $token = $userExist->createToken('auth_token')->plainTextToken;
        return response()->json(['access_token' => $token, "validation" => true]);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'message' => 'El usuario no está autenticado o el email no coincide.',
                'validation' => false
            ], 401);
        }
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
}
