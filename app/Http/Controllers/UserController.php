<?php

namespace App\Http\Controllers;

use App\Models\balita;
use App\Models\ibuhamil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user_count = User::count();
        $user = Auth::user();
        $balita_jml = balita::count();
        $ibuhamil_jml = ibuhamil::count();
        return view('home')->with([
            'user' => $user, 'user_count' => $user_count, 'balita_jml' => $balita_jml, 'ibuhamil_jml' => $ibuhamil_jml
        ]);
    }
}
