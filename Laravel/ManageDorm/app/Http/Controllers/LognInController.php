<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
class LognInController extends Controller
{
    public function login_form()
    {
       if(Session::get('auth') == 'admin'){
            return redirect()->route('students.index');
        }
        if(Session::get('auth') != null){
            return redirect()->route('users.index');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        // check username is null
        if($username == null || $password == null){
            Session::flash('error', 'Username or password is empty');
            return redirect()->route('login.form');
        }
        if($username == 'admin' && $password == 'admin'){
            // set session admin
            Session::put('auth', 'admin');
            return redirect()->route('login.form');
        }
        // get data from table account_list
        $data = DB::table('account_list')->get();
        // check username and password
        foreach ($data as $item) {
            if($item->username == $username && $item->password == $password){
                // set session user
                Session::put('auth', $username);
                return redirect()->route('users.index');
            }
        }
        Session::flash('error', 'Username or password is wrong');
        return redirect()->route('login.form');
    }
}
?>