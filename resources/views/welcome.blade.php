@extends('layout')
@section('title', 'HOME')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Trainer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 40px;
        }
        .card-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            color: #343a40;
        }
        .form-group label {
            font-weight: 600;
            color: #343a40;
        }
        select.form-control {
            height: calc(2.25rem + 10px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 10px;
            border: 1px solid #ced4da;
        }
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #343a40;
            color: #ffffff;
        }
        tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        #results {
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2 class="card-title">Find a Trainer</h2>
        <div class="form-group">
            <label for="specialization">Choose a specialization:</label>
            <select name="specialization" id="specialization" class="form-control">
                <option value="">Select Specialization</option>
                <option value="bodybuilding">Bodybuilding</option>
                <option value="youth fitness">Youth Fitness</option>
                <option value="senior fitness">Senior Fitness</option>
                <option value="weight loss">Weight Loss</option>
                <option value="leg">Leg</option>
                <option value="chest">Chest</option>
                <option value="strength">Strength</option>
            </select>
        </div>
        <div id="results"></div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#specialization').on('change', function() {
            var specialization = $(this).val();
            if (specialization) {
                $.ajax({
                    url: '/search',
                    method: 'GET',
                    data: { specialization: specialization },
                    success: function(response) {
                        var html = '<table class="table table-hover"><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody>';
                        $.each(response, function(index, trainer) {
                            html += '<tr><td>' + trainer.name + '</td><td>' + trainer.email + '</td></tr>';
                        });
                        html += '</tbody></table>';
                        $('#results').html(html);
                    }
                });
            } else {
                $('#results').html('');
            }
        });
    });
</script>
@include('include.footer')
</body>
</html>

@endsection
