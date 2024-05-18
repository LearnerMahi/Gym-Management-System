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
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            padding: 0 15px;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            padding: 30px;
        }
        .card-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: #007bff;
        }
        .form-group label {
            font-weight: bold;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        #results {
            margin-top: 20px;
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
                        var html = '<table class="table table-striped"><thead><tr><th>Name</th><th>Email</th></tr></thead><tbody>';
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

</body>
</html>

@endsection
