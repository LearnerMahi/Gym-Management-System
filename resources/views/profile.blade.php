@extends('layout')

@section('title', 'HOME')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title" align="center">User Information</h2>
            <hr>
            <div class="mb-3">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
