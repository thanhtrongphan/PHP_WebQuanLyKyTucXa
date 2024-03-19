<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DataController extends Controller
{
        public function GetData()
        {
            // Fetch data from dorm_list table
            $data = DB::table('dorm_list')->get();

            // Send data to view
            return view('showdata', ['data' => $data]);
        } 
        public function login_form()
        {
            return view('login');
        }
        public function login(Request $request)
        {
            $username = $request->input('username');
            $password = $request->input('password');
        
            // Handle your login logic here
        }
}
