<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ Asset('bootstrap/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{ Asset('bootstrap/css/heroic-features.css" rel="stylesheet')}}">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
	
      @include('layout.DashHeader')
	  
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container" style="margin-top:100px;margin-bottom:500px;">
 
	@yield('content')

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    @include('layout.footer')
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ Asset('bootstrap/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ Asset('bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
