<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  <form method="POST" action="{{ route('choose.post') }}">
    @csrf
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="trainer">Trainer</option>
    </select>
    <button type="submit">Submit</button>
</form>


  </body>
</html>
