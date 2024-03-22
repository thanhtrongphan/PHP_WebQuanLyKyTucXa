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
        
}
