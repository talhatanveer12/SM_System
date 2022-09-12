<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" src="/style.css" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://kit.fontawesome.com/b0ca48d263.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        .backgroundColor{
            background-color: #25476A !important;
        }
    </style>
</head>

<title>Document1</title>
</head>

<body id='body'>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <ul class="nav">
                <li class="d-lg-inline d-md-inline d-none nav-item">
                    <a class="navbar-brand" href="/adminDashboard">
                        <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                    </a>
                </li>
                <li class="nav-item">

                    <button data-bs-target="#sidebar" href="#" role="button" data-bs-toggle="collapse"
                        aria-controls="offcanvasExample" class="ml-8 mt-2"><i class="fa-solid fa-bars"></i></button>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-white" type="button" data-toggle="dropdown" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="flex items-center">
                        <img src="/images/profile.png" width="60" height="60" style="border-radius: 50%" />
                        {{ auth()->user()->name }}
                    </div>
                </button>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/institute-profile">
                            <i class="fa-solid fa-user"></i>
                            <span class="pl-2 text-sm">Profile</span>
                        </a></li>
                    <li><a class="dropdown-item" href="/account-settings">
                            <i class="fa-solid fa-gear"></i>
                            <span class="pl-2 text-sm">Change Password</span>
                        </a></li>
                    <li>
                        <form id="form_id" method="POST" action="/logout" class="display: none">
                            @csrf

                            <button class="dropdown-item">
                                <i class="fa-solid fa-lock"></i>
                                <span class="pl-2 text-sm">Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto px-0">
                <div id="sidebar" class="collapse collapse-horizontal show border-end">
                    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100"
                        style="width: 160px;">
                        @can('admin')
                            <x-sidebar.admin-sidebar-menu />
                        @endcan

                        @can('student')
                            <x-sidebar.student-sidebar-menu />
                        @endcan
                    </div>
                </div>
            </div>
            {{ $slot }}
        </div>
    </div>


    <x-flash />
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>
</body>


</html>
