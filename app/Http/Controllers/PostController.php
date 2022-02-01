<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;

// use Illuminate\Support\Carbon;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        // dd(Carbon::now()->toDateString());
        // $posts = Post::where('title','Test')->get();
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

    public function store(StorePostRequest $request)
    {
        // $data = request()->all();
        $data = $request->all();

        // Post::create($data);
        Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        //the logic to store post in the db
        return redirect()->route('posts.index');
    }

    // public function show($postId)
    // {
    //     $post = POST::find($postId);
    //     return view('posts.show', [
    //          'post' => $post
    //     ]);
    // }

    public function show($slug)
    {
        $post = Post::where('slug',$slug)->get();
        return view('posts.show',['post'=>$post]);
    } 

    public function edit($postId)
    {
        $post = Post::find($postId);
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'users' => $users
        ]);
    }

    public function update ($postId, StorePostRequest $request)
    {
        $data = $request->all();

        POST::find($postId)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['post_creator'],
        ]);
        return redirect()->route('posts.index');
    }

    public function destroy($postId)
    {
        $post = POST::find($postId);
        $post -> delete();
        return redirect()->route('posts.index');
    }

}
