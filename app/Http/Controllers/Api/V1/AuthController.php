<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Mail\ForgetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller {
    public function register(Request $request) {
        $fields = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string',
            'phone' => 'required|string|unique:users,phone',
            'role' => 'required|string',
            'password_confirmation' => 'required|same:password'
        ]);

        if ($fields->fails()) {
            return response()->json(['error' => $fields->errors()], 403);
        }

        $user = new User();
        $user->fill($request->except('password_confirmation'));
        $user->save();

        $token = $user->createToken('app_token')->plainTextToken;
        $user = User::query()->with("owner")->findOrFail($user->id);

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = Validator::make($request->all(), [
            'password' => 'required|string'
        ]);

        if ($fields->fails()) {
            return response()->json(['error' => $fields->errors()], 403);
        }

        // Check email
        if ($request->has('email')) {
            $user = User::where('email', $request->email)->first();
        } elseif ($request->has('phone')) {
            $user = User::where('phone', $request->phone)->first();
        } else {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        // Check password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }

        $user->loadMissing("owner");
        $token = $user->createToken('app_token')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }


    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function forgetPassword(Request $request) {
        $fields = Validator::make($request->all(), [
            'email' => 'required|string|email',
        ]);

        if ($fields->fails()) {
            return response()->json(['error' => $fields->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!isset($user)) {
            return response()->json([
                "status" => "failed",
                "status_message" => "User not found"
            ], 404);
        }

        $user->forget_password_token = Str::random(32);
        Mail::to($user->email)->send(new ForgetPassword($user));
        $user->save();

        return response([
            'status' => 'success',
            'status_message' => 'Password reset link has been sent to your registered email id. Click on it to reset your password.'
        ]);
    }

    public function updatePassword(Request $request) {
        $fields = Validator::make($request->all(), [
            'token' => 'required|string',
            'password' => 'required|string',
            'confirmation_password' => 'required|string|same:password'
        ]);

        if ($fields->fails()) {
            return response()->json(['error' => $fields->errors()], 422);
        }

        $user = User::where('forget_password_token', $request->token)->first();

        if (!$user) {
            return response()->json([
                'error' => 'User does not exists or token expired'
            ], 401);
        }

        $user->password = $request->password;
        $user->save();
        return response()->json(['success' => 'Password changed successfully']);
    }

    public function googleLogin(Request $request) {
        // validate request body
        $fields = Validator::make($request->all(), [
            'email' => 'required|string|email|unique:users,email'
        ]);

        if ($fields->fails()) {
            return response()->json([
                'status_message' => $fields->errors()->first()
            ], 422);
        }

        // check if user already exists
        $oldUser = User::where('email', $request->email)->first();
        if (isset($oldUser)) {
            $token = $oldUser->createToken('app_token')->plainTextToken;

            return response([
                "user" => $oldUser,
                "token" => $token
            ], 200);
        }

        // create new user
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt('password'),
            'is_google_login' => true
        ]);
        $token = $user->createToken('app_token')->plainTextToken;

        return response([
            "user" => $user,
            "token" => $token
        ], 200);
    }
}
