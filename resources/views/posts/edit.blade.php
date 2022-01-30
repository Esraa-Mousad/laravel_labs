@extends('posts.create')
@section('title') Edit @endsection

@section('postTitle') 
@foreach ($posts as $post)
{{ $post->title }}
@endforeach
@endsection

@section('description') 
@foreach ($posts as $post)
{{ $post->description }}
@endforeach
@endsection