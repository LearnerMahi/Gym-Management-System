@extends('layout')
@section('title','HOME')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Welcome to the Gym</h1>
    <label for="specialization">Choose a specialization:</label>
    <select name="specialization" id="specialization">
        <option value="">Select Specialization</option>
        <option value="bodybuilding">Bodybuilding</option>
        <option value="youth fitness">Youth Fitness</option>
        <option value="senior fitness">Senior Fitness</option>
        <option value="weight loss">Weight Loss</option>
        <option value="leg">Leg</option>
        <option value="chest">Chest</option>
        <option value="strength">Strength</option>
    </select>

    <div id="results"></div>

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
                            var html = '<table border="1"><tr><th>Name</th><th>Email</th></tr>';
                            $.each(response, function(index, trainer) {
                                html += '<tr><td>' + trainer.name + '</td><td>' + trainer.email + '</td></tr>';
                            });
                            html += '</table>';
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
