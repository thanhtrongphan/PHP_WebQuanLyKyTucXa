<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ClassTrait;
class AccountController extends Controller
{
    use ClassTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('account_list') // replace 'your_table' with the name of your table
        ->join('student_list', 'account_list.student_list_id', '=', 'student_list.id')
        ->select('account_list.*', 'student_list.code')
        ->get();

        return view('admin.account.read_account', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('student_list')->get();
        return view('admin.account.create_account', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // check $request
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('accounts.create');
        }
        // get id from code
        $code = $request->input('code');
        $id = DB::table('student_list')->where('code', $code)->first()->id;
        // if account_list have this id then return error
        $check = DB::table('account_list')->where('student_list_id', $id)->first();
        if ($check) {
            // use session flash show error
            Session::flash('error', 'Student already has an account');
            return redirect()->route('accounts.create');
        }
        // get from form
        $username = $code;
        $password = $request->input('password');
        $image = $request->file('image');
        // change image_code and type jpg or png
        $image_name = $code . '_' . 'avatar' . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);

        DB::table('account_list')->insert([
            'student_list_id' => $id,
            'username' => $username,
            'password' => $password,
            'avatar' => $image_name
        ]);

        return redirect()->route('accounts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student_list = DB::table('student_list')->get();
        $accountData = DB::table('account_list')
            ->join('student_list', 'account_list.student_list_id', '=', 'student_list.id')
            ->select('account_list.*', 'student_list.code')
            ->where('account_list.id', $id)
            ->first();
        $data = [
            'student_list' => $student_list,
            'accountData' => $accountData
        ];

        return view('admin.account.edit_account', ['data' => $data]);
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
        // check $request->password have data
        if ($request->input('password') == null) {
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('accounts.show', $id);
        }
        // get id from code
        $code = $request->input('code');
        $oldCode = DB::table('account_list')->where('id', $id)->first()->username;
        if ($code != $oldCode) {
            $count = DB::table('account_list')->where('username', $code)->count();
            if ($count > 0) {
                Session::flash('error', 'Account already exists');
                return redirect()->route('accounts.show', $id);
            }
        }
        // get from form
        $username = $code;
        $password = $request->input('password');
        $check = $request->hasFile('avatar');
        if (!$check) {
            DB::table('account_list')->where('id', $id)->update([
                'username' => $username,
                'password' => $password
            ]);
            return redirect()->route('accounts.index');
        }
        // delete old image
        $oldimage = DB::table('account_list')->where('id', $id)->first()->avatar;
        unlink(public_path('images') . '\\' . $oldimage);
        // change image_code and type jpg or png
        $image = $request->file('avatar');
        $image_name = $code . '_' . 'avatar' . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image_name);

        DB::table('account_list')->where('id', $id)->update([
            'username' => $username,
            'password' => $password,
            'avatar' => $image_name
        ]);

        return redirect()->route('accounts.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registers_id = DB::table('register_list')->where('account_list_id', $id)->get();
        foreach ($registers_id as $register_id) {
            $register_id = $register_id->id;
            DB::table('register_list')->where('id', $register_id)->delete();
        }
        $payments_id = DB::table('payment_list')->where('account_id', $id)->get();
        foreach ($payments_id as $payment_id) {
            $payment_id = $payment_id->id;
            DB::table('payment_list')->where('id', $payment_id)->delete();
        }
        // delete file image in folder
        $image = DB::table('account_list')->where('id', $id)->first()->avatar;
        unlink(public_path('images') . '/' . $image);
        // delete account
        DB::table('account_list')->where('id', $id)->delete();
        return redirect()->route('accounts.index');
        
    }
}
