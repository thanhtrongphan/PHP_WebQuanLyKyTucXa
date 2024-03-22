<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LognOutController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->forget('auth');
        return redirect()->route('login.form');
    }
}
