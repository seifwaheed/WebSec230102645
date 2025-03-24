<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Http\Controllers\Controller;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only logged-in users can access
    }

    public function index()
    {
        $postsFromDB = Post::all();

        return view("posts.index", ['posts' => $postsFromDB]);
    }

    public function show(Post $post)
    {
        return view('posts.show', ['singlepost' => [$post]]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create', ["users" => $users]);
    }

    public function store()
    {
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        $post = new Post;

        $post->title = $title;
        $post->description = $description;

        $post->save();

        return to_route('posts.index');
    }

    public function edit(Post $post)
    {
        $users = User::all();

        return view('posts.edit', ["users" => $users, "post" => $post]);
    }

    public function update($postID)
    {
        $title = request()->Title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        $singlePostFromDB = Post::findOrFail($postID);
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
        ]);

        return to_route('posts.show', $postID);
    }

    public function destroy($postid)
    {
        $post = Post::findOrFail($postid);
        $post->delete();

        return to_route('posts.index');
    }
}