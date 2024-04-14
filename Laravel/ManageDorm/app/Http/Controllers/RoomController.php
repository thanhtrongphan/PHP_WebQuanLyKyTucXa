<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\ClassTrait;
class RoomController extends Controller
{
    use ClassTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('room_list')
            ->join('dorm_list', 'room_list.dorm_id', '=', 'dorm_list.id')
            ->select('room_list.name as room_name', 'dorm_list.name as dorm_name', 'slots', 'price', 'room_list.id')
            ->get();
        return view('admin.room.read_room', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = DB::table('dorm_list')->get();
        return view('admin.room.create_room', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('rooms.create');
        }
        $id_dorm = $request->input('id_dorm');
        $name = $request->input('name');
        // capitalization first letter
        $name = ucwords($name);
        $slots = $request->input('slots');
        $price = $request->input('price');
        

        DB::table('room_list')->insert([
            'dorm_id' => $id_dorm,
            'name' => $name,
            'slots' => $slots,
            'price' => $price
        ]);

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room_list = DB::table('room_list')->where('id', $id)->first();
        $dorm_list = DB::table('dorm_list')->get();
        $data = [
            'room_list' => $room_list,
            'dorm_list' => $dorm_list
        ];
        return view('admin.room.edit_room', ['data' => $data]);
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
            return redirect()->route('rooms.show', ['room' => $id]);
        }
        $id_dorm = $request->input('id_dorm');
        $name = $request->input('name');
        // capitalization first letter
        $name = ucwords($name);
        $slots = $request->input('slots');
        $price = $request->input('price');

        DB::table('room_list')->where('id', $id)->update([
            'dorm_id' => $id_dorm,
            'name' => $name,
            'slots' => $slots,
            'price' => $price
        ]);

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $registes_id = DB::table('register_list')->where('room_list_id', $id)->select('id')->get();
        foreach ($registes_id as $register_id) {
            DB::table('register_list')->where('id', $register_id->id)->delete();
        }
        DB::table('room_list')->where('id', $id)->delete();
        return redirect()->route('rooms.index');
    }
}
