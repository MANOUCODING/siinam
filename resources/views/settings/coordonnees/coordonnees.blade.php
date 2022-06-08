<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

      
        <!-- Fonts -->
        <link rel="stylesheet" href="/assets/admin/vendor/bootstrap/css/bootstrap.min.css">
        <link href="/assets/admin/vendor/fonts/circular-std/style.css" rel="stylesheet">
        <link rel="stylesheet" href="/assets/admin/libs/css/style.css">
        <link rel="stylesheet" href="/assets/admin/vendor/fonts/fontawesome/css/fontawesome-all.css">
        <link rel="stylesheet" href="/assets/admin/vendor/charts/morris-bundle/morris.css">
        <link rel="stylesheet" href="/assets/admin/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
        <title>Gestion Scolaire || SINAM</title>


    {{-- <style type="text/css">.conteneur_general_load_10{overflow:hidden;width:245px;height:200px} .cle_bleu_load_10{border-radius:50px;width:50px;height:50px;border-top:10px solid #094F09;border-right:10px solid #094F09;border-bottom:10px solid #094F09;border-left:10px solid #FFFFFF;-webkit-animation:load_dix 1.4s infinite linear;-moz-animation:load_dix 1.4s infinite linear;-ms-animation:load_dix 1.4s infinite linear;-o-animation:load_dix 1.4s infinite linear;animation:load_dix 1.4s infinite linear} @-webkit-keyframes load_dix{0%{-webkit-transform:rotate(0deg);-moz-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(360deg);-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}100%{-webkit-transform:rotate(720deg);-moz-transform:rotate(720deg);-ms-transform:rotate(720deg);transform:rotate(720deg)}} @-moz-keyframes load_dix{0%{-webkit-transform:rotate(0deg);-moz-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(360deg);-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}100%{-webkit-transform:rotate(720deg);-moz-transform:rotate(720deg);-ms-transform:rotate(720deg);transform:rotate(720deg)}} @-ms-keyframes load_dix{0%{-webkit-transform:rotate(0deg);-moz-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(360deg);-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}100%{-webkit-transform:rotate(720deg);-moz-transform:rotate(720deg);-ms-transform:rotate(720deg);transform:rotate(720deg)}} @keyframes load_dix{0%{-webkit-transform:rotate(0deg);-moz-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg)}50%{-webkit-transform:rotate(360deg);-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);transform:rotate(360deg)}100%{-webkit-transform:rotate(720deg);-moz-transform:rotate(720deg);-ms-transform:rotate(720deg);transform:rotate(720deg)}}</style> --}}

    </head>
    <body  id="app">
        
      
    <script src=" {{ asset('js/app.js') }} "></script>
    <script src="/assets/admin/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="/assets/admin/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="/assets/admin/libs/js/main-js.js"></script>
    <!-- morris-chart js -->
    <script src="/assets/admin/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="/assets/admin/vendor/charts/morris-bundle/morris.js"></script>
    <script src="/assets/admin/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- chart js -->
    <script src="/assets/admin/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="/assets/admin/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- dashboard js -->
    <script src="/assets/admin/libs/js/dashboard-influencer.js"></script>
    <script>
        $(document).ready(function() {
    
            // binding the check all box to onClick event
            $(".chk_all").click(function() {
    
                var checkAll = $(".chk_all").prop('checked');
                if (checkAll) {
                    $(".checkboxes").prop("checked", true);
                } else {
                    $(".checkboxes").prop("checked", false);
                }
    
            });
    
            // if all checkboxes are selected, then checked the main checkbox class and vise versa
            $(".checkboxes").click(function() {
    
                if ($(".checkboxes").length == $(".subscheked:checked").length) {
                    $(".chk_all").attr("checked", "checked");
                } else {
                    $(".chk_all").removeAttr("checked");
                }
    
            });
    
        });
        </script>

    </body>
</html>