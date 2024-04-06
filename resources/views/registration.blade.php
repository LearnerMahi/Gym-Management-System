@extends('layout')
@section('title', 'Registration')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registration.post') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Fullname') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
