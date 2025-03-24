<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscriptController extends Controller
{
    public function index()
{
    $courses = DB::table('courses')->get();
    $grades = DB::table('grades')->get();
    return view('transcript', compact('courses', 'grades'));
}
}
