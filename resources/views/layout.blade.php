<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Gym-Management-System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
     
        header {
            background-color:#343a40; 
            color: #fff; 
            height: 3%;
            padding: 10px 0; 
            position: fixed; 
            top: 0; 
            width: 100%; 
            z-index: 1000; 
        }
    </style>
  </head>
  <body>
  <header>
        @include('include.header') 
    </header>
    <div>
      
    </div>
    <div class="container-fluid">
    
        @yield('content') 
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>