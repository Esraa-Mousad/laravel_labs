<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        // $allPosts = Post::where('title','Test')->get();
        $posts = Post::all(); //to retrieve all records

        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        $users = User::all();

        return view('posts.create',[
            'users' => $users
        ]);
    }

    public function store()
    {
        $data = request()->all();

        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
            // will be ignored cause they aren't in fillable
            // 'un_known_column' => 'ajshdahsouid',
            // 'id' => 70,
        ]);// insert into (title,descripotion) values ('asdasd')

        // dd('test'); any logic after dd won't be executed
        //the logic to store post in the db
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        //query in db select * from posts where id = $postId
        // return $postId;

        $posts = Post::all();
        return view('posts.show', [
             'posts' => $posts
        ]);
    }

    public function edit()
    {
        $posts = Post::all();
        $users = User::all();

        return view('posts.edit', [
            'posts' => $posts,
            'users' => $users
            
        ]);
    }

    // public function edit($postId)
    // {
    //     // $allPosts = Post::all(); //to retrieve all records
    //     $post = Post::where('title','first')->get();

    //     // $postId=1;
    //     // return $postId;
    //     return view('posts.edit', [
    //         'post' => $post
    //     ]);
    // }
}
