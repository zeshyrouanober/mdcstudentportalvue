<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script>
      window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token()
        ]);
      ?>;
    </script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="css/animate.css">
    <link rel="icon" href="images/school-logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display|Barlow+Semi+Condensed|Shadows+Into+Light" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS CDN's -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <script src = "https://code.jquery.com/jquery-3.2.1.min.js"></script>


    {{-- <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script> --}}
  </head>
  <body>

        @section('body')
          @show
          {{-- SCRIPT CDN's --}}
          <script src = "https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

          @section('javascript')
          @show
  </body>
</html>
