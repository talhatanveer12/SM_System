<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>Admin | Dashboard</title>
    <script src="https://kit.fontawesome.com/b0ca48d263.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
    <link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/neon-core.css">
    <link rel="stylesheet" href="assets/css/neon-theme.css">
    <link rel="stylesheet" href="assets/css/neon-forms.css">
    <link rel="stylesheet" href="assets/css/custom.css">







    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <style>
        .backgroundColor {
            color: white !important;
            background-color: #373e4a !important;
            //font-size: 120px !important;
        }

        .fontcolor {
            color: white !important;
            font-size: 12px !important;
        }
    </style>

    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->


</head>

<body class="page-body  page-fade" style="color: black;" id='body'>

    <div class="page-container">
        <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

        <x-sidebar.admin-sidebar />
        <div class="main-content">
            <div class="row">
                <!-- Profile Info and Notifications -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <ul class="user-info pull-left pull-none-xsm">
                        <li class="profile-info dropdown">
                            <!-- add class "pull-right" if you want to place this from right -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="flex">
                                    <img src="assets/images/thumb-1@2x.png" alt="" class="img-circle"
                                        width="44" />
                                    <span class="pt-5">{{ auth()->user()->name }}</span>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="caret"></li>

                                <li>
                                    <a href="/institute-profile">
                                        <i class="entypo-user"></i>
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="/account-settings">
                                        <i class="fa-solid fa-key"></i>
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-4 clearfix hidden-xs">
                    <ul class="list-inline links-list pull-right">
                        <li class="sep"></li>
                        <li class="sep"></li>

                        <li>
                            <form id="form_id" method="POST" action="/logout" class="display: none">
                                @csrf
                                <button class="btn btn-link">
                                    Log Out <i class="entypo-logout right"></i>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            {{ $slot }}

            <!-- lets do some work here... -->
            <!-- Footer -->
            {{-- <footer class="main">

			&copy; 2015 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>

		</footer> --}}
        </div>



    </div>



    <link rel="stylesheet" href="assets/js/dropzone/dropzone.css">

    <!-- Imported styles on this page -->
    <link rel="stylesheet" href="assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="assets/js/rickshaw/rickshaw.min.css">

    <!-- Bottom scripts (common) -->
    <script src="assets/js/gsap/TweenMax.min.js"></script>
    <script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/joinable.js"></script>
    <script src="assets/js/resizeable.js"></script>
    <script src="assets/js/neon-api.js"></script>
    <script src="assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>


    <!-- Imported scripts on this page -->
    <script src="assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
    <script src="assets/js/jquery.sparkline.min.js"></script>
    <script src="assets/js/rickshaw/vendor/d3.v3.js"></script>
    <script src="assets/js/rickshaw/rickshaw.min.js"></script>
    <script src="assets/js/raphael-min.js"></script>
    <script src="assets/js/morris.min.js"></script>
    <script src="assets/js/toastr.js"></script>
    <script src="assets/js/neon-chat.js"></script>


    <script src="assets/js/fileinput.js"></script>
    <script src="assets/js/dropzone/dropzone.js"></script>
    <script src="assets/js/neon-chat.js"></script>

    <!-- JavaScripts initializations and stuff -->
    <script src="assets/js/neon-custom.js"></script>


    <!-- Demo Settings -->
    <script src="assets/js/neon-demo.js"></script>

    <link rel="stylesheet" href="assets/js/select2/select2-bootstrap.css">
    <link rel="stylesheet" href="assets/js/select2/select2.css">
    <link rel="stylesheet" href="assets/js/selectboxit/jquery.selectBoxIt.css">
    <link rel="stylesheet" href="assets/js/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/minimal/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/square/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/flat/_all.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/futurico/futurico.css">
    <link rel="stylesheet" href="assets/js/icheck/skins/polaris/polaris.css">

    <script src="assets/js/select2/select2.min.js"></script>
    <script src="assets/js/bootstrap-tagsinput.min.js"></script>
    <script src="assets/js/typeahead.min.js"></script>
    <script src="assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/bootstrap-timepicker.min.js"></script>
    <script src="assets/js/bootstrap-colorpicker.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/daterangepicker/daterangepicker.js"></script>
    <script src="assets/js/jquery.multi-select.js"></script>
    <script src="assets/js/icheck/icheck.min.js"></script>
    <script src="assets/js/neon-chat.js"></script>



    {{-- <script src="assets/js/neon-calendar.js"></script> --}}
</body>

</html>
