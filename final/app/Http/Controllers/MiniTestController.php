<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiniTestController extends Controller
{
    public function index()
    {
        $bills = DB::table('bills')->get();
        return view('minitest', compact('bills'));
    }
}
