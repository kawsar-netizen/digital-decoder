<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function login(){
    //     return view('backend.pages.login');
    // }

    // public function confirm(LoginRequest $request){

    //     $data = $request->only(['email', 'password']);

    //     if (Auth::attempt($data)) {
    // 		return redirect()->intended('admin/dashboard');
    // 	}else
    //     {
    //         return redirect()->route('login.show');

    //     }
    // }

    // public function logout(){
    //     Auth::logout();
    //     return redirect()->route('login.show');
    // }
}
