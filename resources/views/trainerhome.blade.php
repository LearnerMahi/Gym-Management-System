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
        .btn-update {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }
        .btn-update:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
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
                    <td><span>{{ Auth::guard('trainer')->user()->name }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->contact_number }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->address }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->bio }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->specialization }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->gym_affiliation }}</span></td>
<td><span>{{ Auth::guard('trainer')->user()->gym_membership_id }}</span></td>


                        <td>
                        <form action="{{ route('trainer.update', ['gym_membership_id' => Auth::guard('trainer')->user()->gym_membership_id]) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="gym_membership_id" value="{{ Auth::guard('trainer')->user()->gym_membership_id }}">
<input type="text" name="name" value="{{ Auth::guard('trainer')->user()->name }}" placeholder="Enter your name">

<input type="text" name="contact_number" value="{{ Auth::guard('trainer')->user()->contact_number }}" placeholder="Enter your contact number">
<input type="text" name="address" value="{{ Auth::guard('trainer')->user()->address }}" placeholder="Enter your address">
<input type="text" name="bio" value="{{ Auth::guard('trainer')->user()->bio }}" placeholder="Enter your bio">
<select id="specialization" class="form-control" name="specialization">
    <option value="" disabled selected hidden>Select specialization</option>
    <option value="bodybuilding"{{ (Auth::guard('trainer')->user()->specialization == 'bodybuilding') ? ' selected' : '' }}>Bodybuilding</option>
    <option value="youth fitness"{{ (Auth::guard('trainer')->user()->specialization == 'youth fitness') ? ' selected' : '' }}>Youth Fitness</option>
    <option value="senior fitness"{{ (Auth::guard('trainer')->user()->specialization == 'senior fitness') ? ' selected' : '' }}>Senior Fitness</option>
    <option value="weight loss"{{ (Auth::guard('trainer')->user()->specialization == 'weight loss') ? ' selected' : '' }}>Weight Loss</option>
    <option value="leg"{{ (Auth::guard('trainer')->user()->specialization == 'leg') ? ' selected' : '' }}>Leg</option>
    <option value="chest"{{ (Auth::guard('trainer')->user()->specialization == 'chest') ? ' selected' : '' }}>Chest</option>
    <option value="strength"{{ (Auth::guard('trainer')->user()->specialization == 'strength') ? ' selected' : '' }}>Strength</option>
</select>
<input type="text" name="gym_affiliation" value="{{ Auth::guard('trainer')->user()->gym_affiliation }}" placeholder="Enter your gym affiliation">

    <!-- Add other fields to update here -->
    <button type="submit" class="btn btn-primary">Update</button>

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
