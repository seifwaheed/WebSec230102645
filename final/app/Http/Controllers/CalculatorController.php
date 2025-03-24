<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index()
    {
        return view('calculator');
    }
    
    public function gpaSimulator()
    {
        $courses = DB::table('courses')->get();
        return view('gpa-simulator', compact('courses'));
    }
}
