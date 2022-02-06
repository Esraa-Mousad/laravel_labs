@extends('layouts.app')

@section('title') Show @endsection

@section('content')
<div class="card">
    <h5 class="card-header">Post Info</h5>
    <div class="card-body">
        @foreach ($post as $data)
        <h5 class="card-title">Title</h5>
        <p class="card-text">{{ $data->title }}</p>
        <h5 class="card-title">Slug</h5>
        <p class="card-text">{{ $data->slug }}</p>
        <h5 class="card-title">Description</h5>
        <p class="card-text">{{ $data->description }}</p>
        @endforeach
    </div>
</div>

<div class="card my-4">
    <h5 class="card-header">Post Creator Info</h5>
    <div class="card-body">
        @foreach ($post as $data)
        <h5 class="card-title">Name</h5>
        <p class="card-text">{{ isset($data->user) ? $data->user->name : 'Not Found' }}</p>
        <h5 class="card-title">Email</h5>
        <p class="card-text">{{ isset($data->user) ? $data->user->email : 'Not Found' }}</p>
        <h5 class="card-title">Created At</h5>
        <p class="card-text">{{ $data->created_at ->format('l jS \of F Y h:i:s A') }}</p>
        @endforeach
    </div>
</div>
@endsection
