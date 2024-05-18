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
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
            background: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th, .table td {
            vertical-align: middle;
            color: #fff;
            background: rgba(0, 123, 255, 0.1);
        }
        .table th {
            background-color: #007bff;
            font-weight: bold;
        }
        .table th, .table td {
            border: 1px solid #dee2e6;
            padding: 15px;
        }
        .table th, .table td {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
        }
        .table th:nth-last-child(2), .table td:nth-last-child(2) {
            width: calc(100% / 7);
        }
        .table th:last-child, .table td:last-child {
            width: calc((100% / 7) * 2);
        }
        .btn-update {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
            border-radius: 25px;
            padding: 10px 20px;
            font-size: 1em;
        }
        .btn-update:hover {
            background-color: #218838;
            border-color: #1e7e34;
            color: #fff;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 10px 15px;
        }
        .form-control::placeholder {
            color: #ccc;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.3);
            color: #fff;
        }
        @media (max-width: 768px) {
            .table th, .table td {
                padding: 10px;
                font-size: 0.9em;
            }
            .btn-update {
                padding: 0.375rem 0.75rem;
                font-size: 0.875em;
            }
        }
        @media (max-width: 576px) {
            .table th, .table td {
                padding: 8px;
                font-size: 0.8em;
            }
            .table-responsive {
                font-size: 0.8em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mb-4 text-center">Trainer Information</h2>
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
                        <td>{{ Auth::guard('trainer')->user()->name }}</td>
                        <td>{{ Auth::guard('trainer')->user()->contact_number }}</td>
                        <td>{{ Auth::guard('trainer')->user()->address }}</td>
                        <td>{{ Auth::guard('trainer')->user()->bio }}</td>
                        <td>{{ Auth::guard('trainer')->user()->specialization }}</td>
                        <td>{{ Auth::guard('trainer')->user()->gym_affiliation }}</td>
                        <td>{{ Auth::guard('trainer')->user()->gym_membership_id }}</td>
                        <td>
                            <form action="{{ route('trainer.update', ['gym_membership_id' => Auth::guard('trainer')->user()->gym_membership_id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="gym_membership_id" value="{{ Auth::guard('trainer')->user()->gym_membership_id }}">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" value="{{ Auth::guard('trainer')->user()->name }}" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="contact_number" value="{{ Auth::guard('trainer')->user()->contact_number }}" placeholder="Enter your contact number">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="address" value="{{ Auth::guard('trainer')->user()->address }}" placeholder="Enter your address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="bio" value="{{ Auth::guard('trainer')->user()->bio }}" placeholder="Enter your bio">
                                </div>
                                <div class="form-group">
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
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="gym_affiliation" value="{{ Auth::guard('trainer')->user()->gym_affiliation }}" placeholder="Enter your gym affiliation">
                                </div>
                                <button type="submit" class="btn btn-update">Update</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJTYa69tOe3W1pMdI6SlkDwnOB0yJGp4UN/6pJ0IBxUU0D8jT" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-pjaaA8dDz/npU8BIyyhBBm/iybbV7pKt5lZhp2mwTrY2Rd93bktz0pP0FU3QfeQ2" crossorigin="anonymous"></script>
</body>
</html>
@endif
