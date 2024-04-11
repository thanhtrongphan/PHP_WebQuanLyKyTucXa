<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $code = session('auth');
        $data = DB::table('student_list')->where('code', $code)->first();
        return view('user.info_user', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('student_list')->where('id', $id)->first();
        return view('user.edit_user', ['user' => $data]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $contact = $request->contact;
        $email = $request->email;
        $address = $request->address;
        DB::table('student_list')->where('id', $id)->update(['contact' => $contact, 'email' => $email, 'address' => $address]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function changePassword()
    {
        $code = session('auth');
        $data = DB::table('student_list')->where('code', $code)->first();
        return view('user.change_password', ['data' => $data]);
    }
    public function updatePassword(Request $request, string $id)
    {
        $code = session('auth');
        $pass = DB::table('account_list')->where('username', $code)->select('password')->first();
        $input_pass = $request->password;
        if($pass->password != $input_pass)
        {
            Session::flash('error', 'Incorrect password');
            return redirect()->route('users.changePassword');
        }
        $new_pass = $request->new_pass;
        $new_pass_confirm = $request->new_pass_confirm;
        if($new_pass != $new_pass_confirm)
        {
            Session::flash('error', 'Password does not match');
            return redirect()->route('users.changePassword');
        }
        // update password
        DB::table('account_list')->where('username', $code)->update(['password' => $new_pass]);
        return redirect()->route('users.index');
    }
    public function register_room(){
        $code = session('auth');
        $data = DB::table('register_list')
        ->join('account_list', 'register_list.code', '=', 'account_list.username')
    }
}
