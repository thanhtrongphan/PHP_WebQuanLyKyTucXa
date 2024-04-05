<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DormController extends Controller
{
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
        $name = $request->name;
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
        $name = $request->name;
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
        DB::table('dorm_list')->where('id', $id)->delete();
        return redirect()->route('dorms.index');
    }
}
