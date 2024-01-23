<?php

namespace App\Http\Controllers;

use App\Models\balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        
        if(Auth::user()){
           return redirect()->intended('home')->with([]);
        }

        return view('login');
    }

    public function proses(Request $request){
        $request->validate([
            'username'=> 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]
    );

    $kredensial = $request->only('username','password');

    if(auth::attempt($kredensial)){
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user){
            return redirect()->intended('home');
        }

        return redirect()->intended('/');
    }

        return back()->withErrors([
            'username' => 'Maaf username atau password salah'
        ])->onlyInput('username');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
