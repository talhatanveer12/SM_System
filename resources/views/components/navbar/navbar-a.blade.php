<nav class="navbar bg-light">
    <div class="container-fluid">

        <ul class="nav">
            <li class="nav-item">
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
            <div id="sidebar" class="collapse collapse-horizontal show border-end sm:hide">
                <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100" style="width: 160px;">
                    <a href="/adminDashboard" data-bs-parent="#sidebar" class=" text-truncate mt-2 focus-within:text-blue-500 text-decoration-none hover:text-blue-500 m-2 text-left text-black text-sm w-full">
                        <i class="fa-solid fa-house"></i>
                        <span class="pl-2">Dashboard</span>
                    </a>
                    <x-sidebar.dropdown>
                        <x-slot name="trigger">
                            <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                <i class="fa-solid fa-gear"></i>
                                <span class="pl-2">General Settings</span>
                            </button>
                        </x-slot>
                        <x-sidebar.dropdown-item href="/institute-profile">institute Profile</x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item href="/fee-particulars">Fee Particular</x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item href="/marks-grading">Marks Grading</x-sidebar.dropdown-item>
                        <x-sidebar.dropdown-item href="/account-settings">Account Settings</x-sidebar.dropdown-item>
                    </x-sidebar.dropdown>

                    <x-sidebar.dropdown>
                        <x-slot name="trigger">
                            <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
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
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-book-open"></i>
                                    <span class="pl-2">Courses</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="#">Classes with Courses</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Assign Courses</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>

                    <div class="flex items-center">
                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="pl-2">Students</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="/add-student">All Students</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Add New</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Admission Letter</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>

                    <div class="flex items-center">
                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <span class="pl-2">Employees</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="#">All Employees</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Add New</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Job Letter</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>

                    <div class="flex items-center">
                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
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
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-clipboard-user"></i>
                                    <span class="pl-2">Attendance</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="#">Mark Students Attendance</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Mark Employees Attendance</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Students Attendance Report</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Employees Attendance Report</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>

                    <div class="flex items-center">
                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-book"></i>
                                    <span class="pl-2">Lesson Plan</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="#">Manage Lesson Plan</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Manage Syllabus Status</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Lesson</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Topics</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>


                    <div class="flex items-center">
                        <x-sidebar.dropdown>
                            <x-slot name="trigger">
                                <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                                    <i class="fa-solid fa-file-circle-check"></i>
                                    <span class="pl-2">Exams</span>
                                </button>
                            </x-slot>
                            <x-sidebar.dropdown-item href="#">Create New Exams</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Edit or Delete</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Add / Update Exams Marks</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Result Card</x-sidebar.dropdown-item>
                            <x-sidebar.dropdown-item href="#">Exam Results</x-sidebar.dropdown-item>
                        </x-sidebar.dropdown>
                    </div>

                </div>
            </div>
        </div>
        <main class="col ps-md-2 pt-2">
            <a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse" class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</a>
            <div class="page-header pt-3">
                <h2>Bootstrap 5 Sidebar Menu - Simple</h2>
            </div>
            <p class="lead">A offcanvas "push" vertical nav menu example.</p>
            <hr>
            <div class="row">
                <div class="col-12">
                    <p>This is a simple collapsing sidebar menu for Bootstrap 5. Unlike the Offcanvas component that overlays the content, this sidebar will "push" the content. Sriracha biodiesel taxidermy organic post-ironic, Intelligentsia salvia mustache 90's code editing brunch. Butcher polaroid VHS art party, hashtag Brooklyn deep v PBR narwhal sustainable mixtape swag wolf squid tote bag. Tote bag cronut semiotics, raw denim deep v taxidermy messenger bag. Tofu YOLO Etsy, direct trade ethical Odd Future jean shorts paleo. Forage Shoreditch tousled aesthetic irony, street art organic Bushwick artisan cliche semiotics ugh synth chillwave meditation. Shabby chic lomo plaid vinyl chambray Vice. Vice sustainable cardigan, Williamsburg master cleanse hella DIY 90's blog.</p>
                    <p>Ethical Kickstarter PBR asymmetrical lo-fi. Dreamcatcher street art Carles, stumptown gluten-free Kickstarter artisan Wes Anderson wolf pug. Godard sustainable you probably haven't heard of them, vegan farm-to-table Williamsburg slow-carb readymade disrupt deep v. Meggings seitan Wes Anderson semiotics, cliche American Apparel whatever. Helvetica cray plaid, vegan brunch Banksy leggings +1 direct trade. Wayfarers codeply PBR selfies. Banh mi McSweeney's Shoreditch selfies, forage fingerstache food truck occupy YOLO Pitchfork fixie iPhone fanny pack art party Portland.</p>
                </div>
            </div>
        </main>
    </div>
</div>
