@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        @foreach ($posts as $post)
        <h5 class="card-title">Title</h5>
        <p class="card-text">{{ $post->title }}</p>
        <h5 class="card-title">Description</h5>
        <p class="card-text">{{ $post->description }}</p>
        @endforeach
    </div>
</div>

<div class="card my-4">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        @foreach ($posts as $post)
        <h5 class="card-title">Name</h5>
        <p class="card-text">{{ isset($post->user) ? $post->user->name : 'Not Found' }}</p>
        <h5 class="card-title">Email</h5>
        <p class="card-text">{{ isset($post->user) ? $post->user->email : 'Not Found' }}</p>
        <h5 class="card-title">Created At</h5>
        <p class="card-text">{{ $post->created_at }}</p>
        @endforeach
    </div>
</div>
@endsection
