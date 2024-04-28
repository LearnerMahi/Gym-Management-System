<!doctype html>
<html lang="en">
<head>
    <title>Admin Page</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
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
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 8px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4">Admin Page</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
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
</body>
</html>
