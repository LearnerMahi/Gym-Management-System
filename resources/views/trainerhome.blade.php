@if(Auth::guard('trainer')->check())
<!doctype html>
<html lang="en">
<head>
    <title>Trainer Page</title>
    
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
        <h2 class="mb-4 text-center" align="center">Trainer Information</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Bio</th>
                        <th>Specialization</th>
                        <th>Gym Affiliation</th>
                        <th>Gym Membership ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="name" value="{{ Auth::guard('trainer')->user()->name }}"></td>
                        <td><input type="email" name="email" value="{{ Auth::guard('trainer')->user()->email }}"></td>
                        <td><input type="text" name="contact_number" value="{{ Auth::guard('trainer')->user()->contact_number }}"></td>
                        <td><input type="text" name="address" value="{{ Auth::guard('trainer')->user()->address }}"></td>
                        <td><input type="text" name="bio" value="{{ Auth::guard('trainer')->user()->bio }}"></td>
                        <td><input type="text" name="specialization" value="{{ Auth::guard('trainer')->user()->specialization }}"></td>
                        <td><input type="text" name="gym_affiliation" value="{{ Auth::guard('trainer')->user()->gym_affiliation }}"></td>
                        <td><input type="text" name="gym_membership_id" value="{{ Auth::guard('trainer')->user()->gym_membership_id }}"></td>

                        <td>
                        <form action="{{ route('trainer.update', ['gym_membership_id' => Auth::guard('trainer')->user()->gym_membership_id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="gym_membership_id" value="{{ Auth::guard('trainer')->user()->gym_membership_id }}">
    <input type="text" name="name" value="{{ Auth::guard('trainer')->user()->name }}">
    <input type="email" name="email" value="{{ Auth::guard('trainer')->user()->email }}">
    <input type="text" name="contact_number" value="{{ Auth::guard('trainer')->user()->contact_number }}">
    <input type="text" name="address" value="{{ Auth::guard('trainer')->user()->address }}">
    <input type="text" name="bio" value="{{ Auth::guard('trainer')->user()->bio }}">
    <input type="text" name="specialization" value="{{ Auth::guard('trainer')->user()->specialization }}">
    <input type="text" name="gym_affiliation" value="{{ Auth::guard('trainer')->user()->gym_affiliation }}">
    <!-- Add other fields to update here -->
    <button type="submit" class="btn btn-danger">Update</button>
</form>


                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endif
