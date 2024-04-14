<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Traits\ClassTrait;

class StudentController extends Controller
{
    use ClassTrait;
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
        // check if request not eight data then return error
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('students.create');
        }


        //get data
        $code = $request->code;
        // check if code already exists in the database
        $check = DB::table('student_list')->where('code', $code)->first();
        if($check){
            Session::flash('error', 'Code already exists');
            return redirect()->route('students.create');
        }
        // code character must be type 0-9
        if (!ctype_digit($code)) {
            Session::flash('error', 'Code must be number');
            return redirect()->route('students.create');
        }
        
        
        $name = $request->name;
        // change name to uppercase first letter
        $name = ucwords($name);
        $department = $request->department;
        $course = $request->course;
        $gender = $request->gender;
        $contact = $request->contact;
        if(!is_numeric($contact)){
            Session::flash('error', 'Contact must be number');
            return redirect()->route('students.create');
        }
        $email = $request->email;
        $address = $request->address;

        // insert data
        DB::table('student_list')->insert([
            'code' => $code,
            'name' => $name,
            'department' => $department,
            'course' => $course,
            'gender' => $gender,
            'contact' => $contact,
            'email' => $email,
            'address' => $address
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
        // check if request not eight data then return error
        if(!$this->checkRequestData($request)){
            Session::flash('error', 'Please fill all the fields');
            return redirect()->route('students.show', $id);
        }
        //get data
        $code = $request->code;
        $oldCode = DB::table('student_list')->where('id', $id)->first()->code;
        // check if code is same as old code
        if($code != $oldCode){
            $count = DB::table('student_list')->where('code', $code)->count();
            if($count > 0){
                Session::flash('error', 'Code already exists');
                return redirect()->route('students.show', $id);
            }
        }
        // code character must be type 0-9
        if (!ctype_digit($code)) {
            Session::flash('error', 'Code must be number');
            return redirect()->route('students.show', $id);
        }
        
        
        $name = $request->name;
        // change name to uppercase first letter
        $name = ucwords($name);
        $department = $request->department;
        $course = $request->course;
        $gender = $request->gender;
        $contact = $request->contact;
        if(!is_numeric($contact)){
            Session::flash('error', 'Contact must be number');
            return redirect()->route('students.show', $id);
        }
        $email = $request->email;
        $address = $request->address;

        // update data
        DB::table('student_list')->where('id', $id)->update([
            'code' => $code,
            'name' => $name,
            'department' => $department,
            'course' => $course,
            'gender' => $gender,
            'contact' => $contact,
            'email' => $email,
            'address' => $address
        ]);
        return redirect()->route('students.index');
        
    }

    /**s
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // find account_list have student_list_id
        $AccountID = DB::table('account_list')->where('student_list_id', $id)->select('account_list.id')->get();
        // delete account_list id
        foreach($AccountID as $idAc){
            DB::table('account_list')->where('id', $idAc->id)->delete();
        }

        // delete data
        DB::table('student_list')->where('id', $id)->delete();
        return redirect()->route('students.index');
        
    }
    
}