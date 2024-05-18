<!doctype html>
<html lang="en">
<head>
    <title> Admin Page</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
       
        body {
           /*  background-color: #f8f9fa;
            font-family: 'Arial', sans-serif; */
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 12px;
        }
        .table-responsive {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            border-radius: 20px;
            padding: 5px 15px;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .alert {
            font-size: 1.1em;
            margin-bottom: 15px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        .card-text {
            margin: 0;
        }
        h2 {
    background: linear-gradient(to right, #ff7e5f, #feb47b); /* Soft warm gradient */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    margin-top: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); /* Subtle dark shadow */
}



    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Admin Page</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Trainer Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Bio</th>
                        <th>Specialization</th>
                        <th>Certifications</th>
                        <th>Gym Affiliation</th>
                        <th>Gym Membership ID</th>
                        <th>Certification Proof</th>
                        <th>Background Check Document</th>
                        <th>Terms Accepted</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($trainers)
                        @foreach($trainers as $trainer) 
                        <tr>
                            <td>{{$trainer->name}}</td>
                            <td>{{$trainer->email}}</td>
                            <td>{{$trainer->contact_number}}</td>
                            <td>{{$trainer->address}}</td>
                            <td>{{$trainer->bio}}</td>
                            <td>{{$trainer->specialization}}</td>
                            <td>{{$trainer->certifications}}</td>
                            <td>{{$trainer->gym_affiliation}}</td>
                            <td>{{$trainer->gym_membership_id}}</td>
                            <td>{{$trainer->certification_proof}}</td>
                            <td>{{$trainer->background_check_document}}</td>
                            <td>
                                @if($trainer->terms_accepted == "1")
                                    Normal
                                @else 
                                    Problem
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('/adminpage/delete/') . '/' . $trainer->gym_membership_id }}">
                                    <button class="btn btn-danger">Fire</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="alert alert-info" role="alert">
                        Total Number of Trainers: <strong>{{ $count }}</strong>
                    </div>
                    <div class="alert alert-info" role="alert">
                        Total Expenditure: <strong>${{ $count * 50 }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="alert alert-info" role="alert">
                        Total Number of Gym Members: <strong>{{ $count1 }}</strong>
                    </div>
                    <div class="alert alert-info" role="alert">
                        Total Income: <strong>${{ $count1 * 1000 }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-body">
                <div class="card-text">
                    <div class="alert alert-info" role="alert">
                        Total Profit: <strong>${{ $count1 * 1000 - $count * 50 }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
