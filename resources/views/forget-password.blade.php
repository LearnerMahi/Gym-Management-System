@extends('layout')
@section('content')
<main>
    <div class="ms-auto me-auto mt-5" style="width:500px;">

    <div class="mt-5">

@if($errors->any())
<div class="col-12">
  @foreach($errors->all() as $error)
  <div class="alert alert-danger" >{{$error}}</div>
  @endforeach
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger" >{{session('error')}}</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success" >{{session('success')}}</div>
@endif
</div>

    <p>We will send a link to your email.use this link to reset your password</p>
    <form  action="{{ route('forget.password.post') }}" method="POST" >
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                           
                        </div>

                       
                <button type="submit" class="btn btn-primary" >Reset</button>
                
                    </form>
    </div>
</main>   

@endsection