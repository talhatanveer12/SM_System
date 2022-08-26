<nav class="navbar bg-light">
    <div class="container-fluid">

        <ul class="nav">
            <li class="nav-item">
                <a class="navbar-brand" href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </li>
            <li class="nav-item">
                <button data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
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
{{-- <x-sidebar.sidebar>

</x-sidebar.sidebar> --}}

<div class="offcanvas offcanvas-start" tabindex="-1" id= "offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width: 256px;">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <a href="/adminDashboard" class="nav-link align-middle px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 mb-2 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-house text-black mr-2"></i>
        Dashboard
    </a>


    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-gear text-black mr-2"></i>
            General Settings</a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="/institute-profile" class="nav-link px-0 text-black" style="font-size: 14px;"> institute Profile</a>
        </li >
        <li class="ml-14 w-100">
            <a href="/fee-particulars" class="nav-link px-0 text-black" style="font-size: 14px;"> Fee Particular</a>
        </li>
        <li class="ml-14 w-100">
            <a href="/marks-grading" class="nav-link px-0 text-black" style="font-size: 14px;">Marks Grading</a>
        </li>
        <li class="ml-14 w-100">
            <a href="/account-settings" class="nav-link px-0 text-black" style="font-size: 14px;"> Account Settings</a>
        </li>
    </ul>


    <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-pen-to-square text-black mr-2"></i>
            Classes </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="/all-classes" class="nav-link px-0 text-black" style="font-size: 14px;"> All Classes</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Class Details</a>
        </li>
        <li class="ml-14 w-100">
            <a href="/edit-delete-class" class="nav-link px-0 text-black" style="font-size: 14px;">Edit or Delete</a>
        </li>
    </ul>

    <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-book-open text-black mr-2"></i>
            Courses </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;">Classes with Courses</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Assign Courses</a>
        </li>
    </ul>

    <a href="#submenu4" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-user text-black mr-2"></i>
           Students </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu4" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> All Students</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Add New</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Admission Letter</a>
        </li>
    </ul>

    <a href="#submenu5" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-briefcase text-black mr-2"></i>
           Employees </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu5" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> All Employees</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Add New</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Job Letter</a>
        </li>
    </ul>

    <a href="#submenu6" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-money-check text-black mr-2"></i>
          Fee </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu6" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Fee Collect</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Fee Slip</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Fee defaulters</a>
        </li>
    </ul>

    <a href="#submenu7" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-clipboard-user text-black mr-2"></i>
           Attendance </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu7" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Mark Students Attendance</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;">  Mark Employees Attendance</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Students Attendance Report</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Employees Attendance Report</a>
        </li>
    </ul>

    <a href="#submenu8" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-book text-black mr-2"></i>
        Lesson Plan </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu8" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Manage Lesson Plan</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Manage Syllabus Status</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Lesson</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;">  Topics</a>
        </li>
    </ul>

    <a href="#submenu8" data-bs-toggle="collapse" class="nav-link px-0 align-middle mb-2 px-0 mt-2 focus-within:text-blue-500 hover:text-blue-500 ml-10 text-left text-sm w-full">
        <i class="fa-solid fa-file-circle-check text-black mr-2"></i>
        Exams </a>
    <ul class="collapse hide nav flex-column ms-1" id="submenu8" data-bs-parent="#menu">
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Create New Exams</a>
        </li >
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Add / Update Exams Marks</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Result Card</a>
        </li>
        <li class="ml-14 w-100">
            <a href="#" class="nav-link px-0 text-black" style="font-size: 14px;"> Exam Results</a>
        </li>
    </ul>



</div>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample1" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div>
            Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists,
            etc.
        </div>
        <div class="dropdown mt-3">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown">
                Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </div>
    </div>
</div>
