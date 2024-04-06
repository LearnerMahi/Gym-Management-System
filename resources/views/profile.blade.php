@extends('layout')
@section('title','HOME')
@section('content')
<div class="mb-3">
                        <strong>Name:</strong> {{ auth()->user()->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ auth()->user()->email }}
                    </div>
@endsection
