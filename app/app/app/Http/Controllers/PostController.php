<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
    {
    public function index(){

        $allPosts = [
            ['id' => 1 ,'Title' => 'php' ,'Posted By' => 'seif' , 'Created At' => '9:00'],
            ['id' => 2 ,'Title' => 'puthon' ,'Posted By' => 'ahmed' , 'Created At' => '9:00'],
            ['id' => 3 ,'Title' => 'java' ,'Posted By' => 'mohamed' , 'Created At' => '9:00'],
            ['id' => 4 ,'Title' => 'php' ,'Posted By' => 'essam' , 'Created At' => '9:00']
        ];


        return view("posts",['posts' => $allPosts]);
}
    }