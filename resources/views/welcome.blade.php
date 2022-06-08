<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Page de connexion || SINAM</title>


        <!-- plugins:css -->
        <link rel="stylesheet" href="/assets/login/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/assets/login/vendors/base/vendor.bundle.base.css">
        
        <link rel="stylesheet" href="/assets/login/css/style.css">
        <!-- endinject -->
        <link rel="shortcut icon" href="/assets/login/images/favicon.png" />


    </head>
    <body id="login">
       

   <!-- container-scroller -->
   <script src=" {{ asset('js/app.js') }} "></script>
  <!-- plugins:js -->
  <script src="/assets/login/js/jquery.min.js"></script>
  <script src="/assets/login/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="/assets/login/js/off-canvas.js"></script>
  <script src="/assets/login/js/hoverable-collapse.js"></script>
  <script src="/assets/login/js/template.js"></script>
  <!-- endinject -->
 
    </body>
</html>