@extends('layout')
@section('title','HOME')
@section('content')
<br>
<br>
<br>
<div class="mb-3">
                        <strong>Name:</strong> {{ auth()->user()->name }}
                      <br>
                        <strong>Email:</strong> {{ auth()->user()->email }}
                    </div>
@endsection
