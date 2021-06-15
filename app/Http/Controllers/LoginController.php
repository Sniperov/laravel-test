<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;

class LoginController extends Controller
{
    public function indexLogin()
    {
        return view('login');
    }

    public function indexRegister()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with('error', 'Email or password incorrect');
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return redirect('/')->with('error', 'Email or password incorrect!');
        }


        return view('token', ['token' => $token]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($validator->fails()){
            return back();
        }

        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return redirect('/')->with(['status' => 'You are succsessfuly registered']);
    }

}
