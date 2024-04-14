<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ClassTrait;
class UserController extends Controller
{
    use ClassTrait;
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
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('users.show', ['user' => $id]);
        }   
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
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('users.changePassword');
        }
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
        $is_register = DB::table('register_list')
        ->join('account_list', 'register_list.account_list_id', '=', 'account_list.id')
        ->where('account_list.username', $code)
        ->get();
        if(count($is_register) > 0){
            Session::flash('error', 'You have already registered');
            return View('user.register_room_user');
        }
        $rooms = DB::table('room_list')
        ->leftJoin('register_list', 'room_list.id', '=', 'register_list.room_list_id')
        ->select('room_list.id','room_list.name', DB::raw('COUNT(register_list.id) as registered_slots'), 'room_list.slots as max_slots')
        ->groupBy('room_list.id','room_list.name', 'room_list.slots')
        ->get();
        return View('user.register_room_user', ['rooms' => $rooms]);
    }
    public function registered(string $id_room){
        // check id_room is full register
        $room = DB::table('room_list')->where('id', $id_room)->first();
        $registered = DB::table('register_list')->where('room_list_id', $id_room)->count();
        if($room->slots == $registered){
            Session::flash('is_registered', 'Room is full');
            return redirect()->route('users.register_room');
        }
        $code = session('auth');
        $data= DB::table('account_list')->where('username', $code)->select('id')->first();
        $accountID = $data->id;
        $date = date('Y-m-d');
        DB::table('register_list')->insert(['account_list_id' => $accountID, 'room_list_id' => $id_room, 'date' => $date]);
        return redirect()->route('users.register_room');
    }
    public function payment_show(){
        $code = session('auth');
        $account = DB::table('account_list')->where('username', $code)->first();
        $data = DB::table('payment_list')->where('account_id', $account->id)->get();
        return view('user.payment_user', ['data' => $data]);
    }
}
