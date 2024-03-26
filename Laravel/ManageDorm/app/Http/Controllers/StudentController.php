<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get data from table student_list
        $data = DB::table('student_list')->get();
        return view('admin.student.read_student', ['data' => $data]);
    }
    public function create()
    {
        return view('admin.student.create_student');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // insert data
        DB::table('student_list')->insert([
            'code' => $request->code,
            'name' => $request->name,
            'department' => $request->department,
            'course' => $request->course,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect()->route('students.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // find data by id
        $data = DB::table('student_list')->where('id', $id)->first();
        return view('admin.student.edit_student', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // update data
        DB::table('student_list')->where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'department' => $request->department,
            'course' => $request->course,
            'gender' => $request->gender,
            'contact' => $request->contact,
            'email' => $request->email,
            'address' => $request->address
        ]);
        return redirect()->route('students.index');
        
    }

    /**s
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete data
        DB::table('student_list')->where('id', $id)->delete();
        return redirect()->route('students.index');
        
    }
}