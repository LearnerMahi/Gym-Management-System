<!-- resources/views/trainer/register.blade.php -->

@extends('layout2')
@section('title', 'Choose Your Role')

@section('content')

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Registration</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
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
            
                
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Trainer Registration</div> <!-- Corrected: changed "Login" to "Trainer Registration" -->

                    <div class="card-body">
                    <form method="POST" action="{{ route('regtrainer.post') }}">
                            @csrf

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" type="email" class="form-control" name="email" required>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>

                            <!-- Contact Number -->
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input id="contact_number" type="tel" class="form-control" name="contact_number">
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea id="address" class="form-control" name="address" rows="3"></textarea>
                            </div>

                            <!-- Bio -->
                            <div class="form-group">
                                <label for="bio">Bio</label>
                                <textarea id="bio" class="form-control" name="bio" rows="3"></textarea>
                            </div>

                          <!-- Specialization -->
<div class="form-group">
    <label for="specialization">Specialization</label>
    <select id="specialization" class="form-control" name="specialization">
        <option value="bodybuilding">Bodybuilding</option>
        <option value="youth fitness">Youth Fitness</option>
        <option value="senior fitness">Senior Fitness</option>
        <option value="weight loss">Weight Loss</option>
        <option value="leg">Leg</option>
        <option value="chest">Chest</option>
        <option value="strength">Strength</option>
    </select>
</div>


                            <!-- Certifications -->
                            <div class="form-group">
                                <label for="certifications">Certifications</label>
                                <textarea id="certifications" class="form-control" name="certifications" rows="3"></textarea>
                            </div>

                           

                            <!-- Gym Affiliation -->
                            <div class="form-group">
                                <label for="gym_affiliation">Gym Affiliation</label>
                                <input id="gym_affiliation" type="text" class="form-control" name="gym_affiliation">
                            </div>

                            <!-- Gym Membership ID -->
                            <div class="form-group">
                                <label for="gym_membership_id">Gym Membership ID</label>
                                <input id="gym_membership_id" type="text" class="form-control" name="gym_membership_id">
                            </div>

                            <!-- Certification Proof -->
                            <div class="form-group">
                                <label for="certification_proof">Certification Proof</label>
                                <input id="certification_proof" type="file" class="form-control-file" name="certification_proof">
                            </div>

                            <!-- Background Check Document -->
                            <div class="form-group">
                                <label for="background_check_document">Background Check Document</label>
                                <input id="background_check_document" type="file" class="form-control-file" name="background_check_document">
                            </div>

                            <!-- Terms Accepted -->
                            <!-- Terms Accepted -->
<!-- Terms Accepted -->
<div class="form-group">
    <label for="terms_accepted">Accept the terms and conditions</label>
    <select class="form-control" id="terms_accepted" name="terms_accepted" required>
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select>
</div>




                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        
    
</body>
</html>
@endsection