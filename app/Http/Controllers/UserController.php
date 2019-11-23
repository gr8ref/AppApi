<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
class UserController extends Controller {
    //
    public function index()
    {
        $user = Auth::user();
        if($user->is_admin) {
            return response()->json(User::with(['orders'])->get());
        }
        
    }

    public function login(Request $request)
        {
            /*
            $status = 401;
            $response = ['error' => 'Unauthorised'];

                 if (Auth::attempt($request->only(['email', 'password']))) {
                     $status = 200;
                     $response = [
                         'user' => Auth::user(),
                         'token' => Auth::user()->createToken('MyApp')->accessToken,
                     ];
                 }

            return response()->json($response, $status);
            */
            
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);        $credentials = request(['email', 'password']);        
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);        
            $user = $request->user();        
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->token;        
            
            if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
            
            return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();        
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function show(User $user) {
        return response()->json($user);
    }

    public function showOrders(User $user)
    {
        return response()->json($user->orders()->with(['product'])->get());
    }
}