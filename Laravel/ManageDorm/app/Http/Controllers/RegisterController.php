<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('room_list')
            ->leftJoin('register_list', 'room_list.id', '=', 'register_list.room_list_id')
            ->join('dorm_list', 'dorm_list.id', '=', 'room_list.dorm_id')
            ->select('room_list.id','dorm_list.name as dorm_name', 'room_list.name as room_name', DB::raw('count(register_list.id) as registered_slots'), 'room_list.slots')
            ->groupBy('room_list.id','dorm_list.name', 'room_list.name', 'room_list.slots')
            ->get();
        return view('admin.register.read_register', ['data' => $data]);
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
        $data = DB::table('account_list')
            ->join('register_list', 'account_list.id', '=', 'register_list.account_list_id')
            ->join('room_list', 'room_list.id', '=', 'register_list.room_list_id')
            ->join('dorm_list', 'dorm_list.id', '=', 'room_list.dorm_id')
            ->select('register_list.id', 'account_list.username', 'register_list.date')
            ->where('room_list.id', '=', $id)
            ->get();
        return view('admin.register.edit_register', ['data' => $data]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete register
        DB::table('register_list')->where('id', '=', $id)->delete();
        return redirect()->route('register.index');
    }
}
