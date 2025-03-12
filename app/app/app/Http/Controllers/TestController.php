<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller //StudlyCase
{
    public function firstAction()//camelCase
    {
        $localname = 'seif waheed ';
        $books = ['phhp', 'java', 'javascript', 'python'];
        return view('test',['name'=>$localname, "age"=>"555" , "books"=>$books]);

    }
    public function gread ()
    {
        return "hello world";
    }
}
