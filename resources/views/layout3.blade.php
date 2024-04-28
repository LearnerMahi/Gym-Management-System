<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Gym-Management-System')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>
        /* Customize your header style here */
        header {
            background-color:#343a40; /* Set a consistent background color */
            color: #fff; /* Set text color */
            height: 3%;
            padding: 10px 0; /* Add padding to the header */
            position: fixed; /* Fixed positioning */
            top: 0; /* Align header to the top */
            width: 100%; /* Full width */
            z-index: 1000; /* Ensure the header is on top of other elements */
        }
    </style>
  </head>
  <body>
  <header>
        @include('include.header1') <!-- Include your header content here -->
    </header>
    <div class="">
        <div class=""></div>
    </div>
    <div class="container-fluid">
    @yield('content') <!-- Main content area -->
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>