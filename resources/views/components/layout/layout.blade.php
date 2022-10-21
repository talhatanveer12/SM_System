<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="/assets/images/favicon.ico">

    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/b0ca48d263.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    {{-- @vite(['resources/js/app.js']) --}}
    <link rel="stylesheet" href="/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="/assets/css/font-icons/entypo/css/entypo.css">

    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/neon-core.css">
    <link rel="stylesheet" href="/assets/css/neon-theme.css">
    <link rel="stylesheet" href="/assets/css/neon-forms.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <link rel="stylesheet" href="/assets/css/skins/blue.css">

    <script src="/assets/js/jquery-1.11.3.min.js"></script>
    <style>
        .color {
            color: black !important;
        }

        .backgroundColor {
            color: white !important;
            background-color: #0d3a6d !important;
            //font-size: 120px !important;
        }

        .fontcolor {
            color: white !important;
            font-size: 12px !important;
        }

        .tablestyle {
            border: none !important;
        }

        th {
            background-color: #0d3a6d !important;
            color: white !important;
        }

        .imgPhoto {
            width: 50px !important;
            height: 50px !important;
        }
    </style>
</head>

<body class="page-body skin-blue page-fade" style="color: black !important;" id='body'>


    <div class="page-container ">
        @can('admin')
            <x-sidebar.admin-sidebar />
        @endcan
        @can('student')
            <x-sidebar.student-sidebar />
        @endcan
        @can('teacher')
            <x-sidebar.admin-sidebar />
        @endcan
        @can('guardian')
            <x-sidebar.student-sidebar />
        @endcan
        <div class="main-content">
            <x-navbar.navbar />
            @if (session()->has('success'))
                <div class="alert alert-success alert-block" role="alert">
                    <button class="close" data-dismiss="alert"></button>
                    {{ session('success') }}
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-block" role="alert">
                    <button class="close" data-dismiss="alert"></button>
                    {{ session()->get('error') }}
                </div>
            @endif
            {{ $slot }}
        </div>
    </div>


    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Sample Toastr Notification
            setTimeout(function() {
                console.log("Sdsdsdsdsd");
                $("div.alert").remove();
            }, 5000);

        });
    </script>



    <link rel="stylesheet" href="/assets/js/dropzone/dropzone.css">
    {{-- <script src="assets/js/toastr.js"></script> --}}

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="/assets/js/rickshaw/rickshaw.min.css">

    <!-- Bottom scripts (common) -->
    <script src="/assets/js/gsap/TweenMax.min.js"></script>
    <script src="/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/joinable.js"></script>
    <script src="/assets/js/resizeable.js"></script>
    <script src="/assets/js/neon-api.js"></script>
    <script src="/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


    <!-- Imported scripts on this page -->
    <script src="/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="/assets/js/jquery.sparkline.min.js"></script>
    <script src="/assets/js/rickshaw/vendor/d3.v3.js"></script>
    <script src="/assets/js/rickshaw/rickshaw.min.js"></script>
    <script src="/assets/js/raphael-min.js"></script>
    <script src="/assets/js/morris.min.js"></script>
    {{-- <script src="/assets/js/toastr.js"></script>
    <script src="assets/js/neon-chat.js"></script> --}}


    <script src="/assets/js/fileinput.js"></script>
    <script src="/assets/js/dropzone/dropzone.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="/assets/js/neon-custom.js"></script>


    <!-- Demo Settings -->
    <script src="/assets/js/neon-demo.js"></script>

    <link rel="stylesheet" href="/assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="/assets/js/select2/select2.css">
    <link rel="stylesheet" href="/assets/js/selectboxit/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="/assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="/assets/js/icheck/skins/minimal/_all.css">
    <link rel="stylesheet" href="/assets/js/icheck/skins/square/_all.css">
    <link rel="stylesheet" href="/assets/js/icheck/skins/flat/_all.css">
    <link rel="stylesheet" href="/assets/js/icheck/skins/futurico/futurico.css">
    <link rel="stylesheet" href="/assets/js/icheck/skins/polaris/polaris.css">

    <script src="/assets/js/select2/select2.min.js"></script>
    <script src="/assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="/assets/js/typeahead.min.js"></script>
    <script src="/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="/assets/js/bootstrap-datepicker.js"></script>
    <script src="/assets/js/bootstrap-timepicker.min.js"></script>
    <script src="/assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="/assets/js/moment.min.js"></script>
    <script src="/assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="/assets/js/jquery.multi-select.js"></script>
    <script src="/assets/js/icheck/icheck.min.js"></script>
    {{-- <script src="/assets/js/neon-chat.js"></script> --}}




</body>

</html>
