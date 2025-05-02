<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>CORK Admin Template - Sales Dashboard </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <link href="{{ asset('AdminPannel/assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('AdminPannel/assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('AdminPannel/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminPannel/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('AdminPannel/assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('AdminPannel/plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('AdminPannel/assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" class="dashboard-sales" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body>
    @include('layouts.AdminLayouts.Header1')

    <main>
        @yield('content')
    </main>

    @include('layouts.AdminLayouts.Footer1')



    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('AdminPannel/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('AdminPannel/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('AdminPannel/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('AdminPannel/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('AdminPannel/assets/js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('AdminPannel/assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('AdminPannel/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('AdminPannel/assets/js/dashboard/dash_2.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>
</html>