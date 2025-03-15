<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $allPosts = [
            ['id' => 1, 'Title' => 'php', 'posted_creator' => 'seif', 'Created_At' => '9:00'],
            ['id' => 2, 'Title' => 'puthon', 'posted_creator' => 'ahmed', 'Created_At' => '9:00'],
            ['id' => 3, 'Title' => 'java', 'posted_creator' => 'mohamed', 'Created_At' => '9:00'],
            ['id' => 4, 'Title' => 'php', 'posted_creator' => 'essam', 'Created_At' => '9:00']
        ];


        return view("posts.index", ['posts' => $allPosts]);
    }


    public function show($postID)
    {
        $card = [['id' => 1, 'Title' => 'php','discreption' => 'that is the best porgramming lan', 'posted_creator' => 'seif', 'Created At' => '9:00'],
                 ['id' => 2, 'Title' => 'puthon','discreption' => 'that is the best porgramming lan', 'posted_creator' => 'ahmed', 'Created At' => '9:00'],
                 ['id' => 3, 'Title' => 'java','discreption' => 'that is the best porgramming lan', 'posted_creator' => 'mohamed', 'Created At' => '9:00'],
                 ['id' => 4, 'Title' => 'php','discreption' => 'that is the best porgramming lan', 'posted_creator' => 'essam', 'Created At' => '9:00']];

        return view('posts.show', ['cards' => $card]);
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store()  {
        $Title = request()->Title;
        $discreption = request()->discreption;
        $posted_creator = request()->posted_creator;
        

        return to_route('posts.index') ;
        
    }
}