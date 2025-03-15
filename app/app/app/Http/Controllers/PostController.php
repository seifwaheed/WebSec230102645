<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {

        $allPosts = [
            ['id' => 1, 'Title' => 'php', 'postCreator' => 'seif', 'Created_At' => '9:00'],
            ['id' => 2, 'Title' => 'puthon', 'postCreator' => 'ahmed', 'Created_At' => '9:00'],
            ['id' => 3, 'Title' => 'java', 'postCreator' => 'mohamed', 'Created_At' => '9:00'],
            ['id' => 4, 'Title' => 'php', 'postCreator' => 'essam', 'Created_At' => '9:00']
        ];


        return view("posts.index", ['posts' => $allPosts]);
    }


    public function show($postID)
    {
        $card = [['id' => 1, 'Title' => 'php','description' => 'that is the best porgramming lan', 'postCreator' => 'seif', 'Created At' => '9:00'],
                 ['id' => 2, 'Title' => 'puthon','description' => 'that is the best porgramming lan', 'postCreator' => 'ahmed', 'Created At' => '9:00'],
                 ['id' => 3, 'Title' => 'java','description' => 'that is the best porgramming lan', 'postCreator' => 'mohamed', 'Created At' => '9:00'],
                 ['id' => 4, 'Title' => 'php','description' => 'that is the best porgramming lan', 'postCreator' => 'essam', 'Created At' => '9:00']];

        return view('posts.show', ['cards' => $card]);
    }

    public function create()
    {
        return view('posts.create'); 
    }

    public function store()  {
        $Title = request()->Title;
        $description = request()->description;
        $postCreator = request()->postCreator;
        

        return to_route('posts.index') ;
        
    }
    
    public function edit ()
    {
        return view('posts.edit');
    }

    public function update()  {
        $Title = request()->Title;
        $description = request()->description;
        $postCreator = request()->postCreator;
        // dd($Title, $description, $postCreator);

        return to_route('posts.show',1) ;
        
    }

}