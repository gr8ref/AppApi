<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
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
        }

    public function show(User $user) {
        return response()->json($user);
        }
    public function showOrders(User $user)
        {
        return response()->json($user->orders()->with(['product'])->get());
        }
}