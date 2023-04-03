<?php

namespace App\Http\Controllers\Masyarakat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class MasyarakatLoginController extends Controller
 {
  use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function guard()
    {
        return Auth::guard('masyarakat');
    }

    public function showLoginForm()
    {
        return view ('auth.loginmasyarakat');
    }

    public function username()
    {
        return 'username';
    }

    public function redirectTo()
    {
        return view ('pengaduan/create');
    }
}
