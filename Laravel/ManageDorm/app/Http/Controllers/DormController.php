<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits;
use App\Http\Traits\ClassTrait;
use Illuminate\Support\Facades\Session;

class DormController extends Controller
{
    use ClassTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('dorm_list')->get();
        return view('admin.dorm.read_dorm', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dorm.create_dorm');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // check $request
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('dorms.create');
        }
        $name = $request->name;
        // capitalization first letter
        $name = ucwords($name);
        DB::table('dorm_list')->insert([
            'name' => $name
        ]);
        return redirect()->route('dorms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('dorm_list')->where('id', $id)->first();
        return view('admin.dorm.edit_dorm', ['data' => $data]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('dorms.show', $id);
        }
        $name = $request->name;
        // capitalization first letter
        $name = ucwords($name);
        DB::table('dorm_list')->where('id', $id)->update([
            'name' => $name
        ]);
        return redirect()->route('dorms.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rooms_id = DB::table('room_list')->where('dorm_id', $id)->select('id')->get();
        foreach ($rooms_id as $room_id) {
            $registers_id = DB::table('register_list')->where('room_list_id', $room_id->id)->select('id')->get();
            foreach ($registers_id as $register_id) {
                DB::table('register_list')->where('id', $register_id->id)->delete();
            }
        }
        DB::table('dorm_list')->where('id', $id)->delete();
        return redirect()->route('dorms.index');
    }
}
