@extends('layouts.app')

@section('title')Index @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn btn-success">Create Post</a>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($posts as $post)
              <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                <td>{{ $post->created_at->toDateString()}}</td>
                <td class="row">
                    <a href="{{ route('posts.show', $post->id) }}" class="col-2 me-2 btn btn-success">View</a>
                    
                    <a href="{{ route('posts.edit', $post->id) }}" class="col-2 btn btn-primary">Edit</a>

                    <form class="col-2" method="post" action="{{ route('posts.destroy', $post->id) }}">
                      @csrf
                      @method ('delete')
                     <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection
    