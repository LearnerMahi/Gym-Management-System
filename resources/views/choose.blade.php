@extends('layout3')
@section('title', 'Choose Your Role')

@section('content')
<!doctype html>
<html lang="en">
<head>
    <title>Choose Role</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 400px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-submit {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <br>
        <h2 class="text-center mb-4">Choose Your Role</h2>
        <form method="POST" action="{{ route('choose.post') }}">
            @csrf
            <div class="form-group">
                <select class="form-control" name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="trainer">Trainer</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-submit btn-block">Submit</button>
        </form>
    </div>

</body>
</html>
@endsection