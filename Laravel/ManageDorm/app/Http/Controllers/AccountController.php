<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class AccountController extends Controller
{
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
        $username = $request->input('username');
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
        $data = DB::table('account_list')
            ->join('student_list', 'account_list.student_list_id', '=', 'student_list.id')
            ->select('account_list.*', 'student_list.code')
            ->where('account_list.id', $id)
            ->first();
        if (!$data) {
            return redirect()->route('accounts.index');
        }

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
        // get id from code
        $code = $request->input('code');
        // get from form
        $username = $request->input('username');
        $password = $request->input('password');
        $image = $request->file('image');
        // if image is null then update without image
        if ($image == null) {
            DB::table('account_list')->where('id', $id)->update([
                'username' => $username,
                'password' => $password
            ]);
            return redirect()->route('accounts.index');
        }
        // change image_code and type jpg or png
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
        // delete file image in folder
        $image = DB::table('account_list')->where('id', $id)->first()->avatar;
        unlink(public_path('images') . '/' . $image);
        // delete account
        DB::table('account_list')->where('id', $id)->delete();
        return redirect()->route('accounts.index');
        
    }
}
