<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" src="/style.css" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/b0ca48d263.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<title>Document1</title>
</head>

<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">

            <ul class="nav">
                <li class="d-lg-inline d-md-inline d-none nav-item">
                    <a class="navbar-brand" href="/">
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
                    <li><a class="dropdown-item" href="#">
                            <i class="fa-solid fa-user"></i>
                            <span class="pl-2">Profile</span>
                        </a></li>
                    <li><a class="dropdown-item" href="#">
                            <i class="fa-solid fa-gear"></i>
                            <span class="pl-2">Account Settings</span>
                        </a></li>
                    <li>
                        <form id="form_id" method="POST" action="/logout" class="display: none">
                            @csrf

                            <button class="dropdown-item">
                                <i class="fa-solid fa-lock"></i>
                                <span class="pl-2">Logout</span>
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
                        <a href="/adminDashboard" data-bs-parent="#sidebar"
                            class=" text-truncate mt-2 focus-within:text-blue-500 text-decoration-none hover:text-blue-500 m-2 text-left text-black text-sm w-full">
                            <div class="focus:text-blue-500 hover:text-blue-500 ">
                                <i class="fa-solid fa-house"></i>
                                <span class="pl-2">Dashboard</span>
                            </div>
                        </a>

                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-gear"></i>
                                    <span class="pl-2">General Settings</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="/institute-profile">institute Profile
                            </x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="/fee-particulars">Fee Particular</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="/marks-grading">Marks Grading</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="/account-settings">Account Settings</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>

                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button
                                    class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <span class="pl-2">Classes</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="/all-classes">All Classes</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Class Details</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="/edit-delete-class">Edit or Delete</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>


                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-book-open"></i>
                                        <span class="pl-2">Courses</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="/add-courses">Add Courses</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="/assign-courses">Assign Courses</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-user"></i>
                                        <span class="pl-2">Students</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="/all-student">All Students</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="/add-student">Add New</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Admission Letter</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-briefcase"></i>
                                        <span class="pl-2">Employees</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="/all-employee">All Employees</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="/add-employee">Add New</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Job Letter</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-money-check"></i>
                                        <span class="pl-2">Fee</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="#">Fee Collect</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Fee Slip</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">fee defaulters</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-clipboard-user"></i>
                                        <span class="pl-2">Attendance</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="#">Mark Students Attendance
                                </x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Mark Employees Attendance
                                </x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Students Attendance Report
                                </x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Employees Attendance Report
                                </x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-book"></i>
                                        <span class="pl-2">Lesson Plan</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="#">Manage Lesson Plan</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Manage Syllabus Status
                                </x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Lesson</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Topics</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>


                        <div class="flex items-center">
                            <x-sidebar.dropdown>
                                <x-slot name="trigger">
                                    <button
                                        class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                        <i class="fa-solid fa-file-circle-check"></i>
                                        <span class="pl-2">Exams</span>
                                    </button>
                                </x-slot>
                                <x-sidebar.dropdown-item href="#">Create New Exams</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Edit or Delete</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Add / Update Exams Marks
                                </x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Result Card</x-sidebar.dropdown-item>
                                <x-sidebar.dropdown-item href="#">Exam Results</x-sidebar.dropdown-item>
                            </x-sidebar.dropdown>
                        </div>

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
