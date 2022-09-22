<div class="sidebar-menu fontcolor">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="/">
                    <img src="images/logo.svg" width="120" alt="" />
                </a>
            </div>
            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu fontcolor">
            <li class="active open">
                @can('admin')
                <a href="/adminDashboard">
                    <i class="fa-solid fa-house"></i>
                    <span class="title">Dashboard</span>
                </a>
                @else
                <a href="/teacherDashboard">
                    <i class="fa-solid fa-house"></i>
                    <span class="title">Dashboard</span>
                </a>
                @endcan
            </li>
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span class="title">General Settings</span>
                </a>
                <ul>
                    @can('admin')
                    <li>
                        <a href="/institute-profile">
                            <span class="title">institute Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="/fee-particulars">
                            <span class="title">Fee Particular</span>
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="/marks-grading">
                            <span class="title">Marks Grading</span>
                        </a>
                    </li>
                    <li>
                        <a href="/account-settings">
                            <span class="title">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </li>
            @can('admin')
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="title">Classes</span>
                </a>
                <ul>
                    <li>
                        <a href="/all-classes">
                            <span class="title">All Classes</span>
                        </a>
                    </li>
                    <li>
                        <a href="/edit-delete-class">
                            <span class="title">Edit or Delete</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="title">Courses</span>
                </a>
                <ul>
                    <li>
                        <a href="/add-courses">
                            <span class="title">Add Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="/assign-courses">
                            <span class="title">Assign Courses</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span class="title">Students</span>
                </a>
                <ul>
                    <li>
                        <a href="/all-student">
                            <span class="title">All Students</span>
                        </a>
                    </li>
                    @can('admin')
                    <li>
                        <a href="/add-student">
                            <span class="title">Add New Student</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @can('admin')
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="title">Teacher</span>
                </a>
                <ul>
                    <li>
                        <a href="/all-employee">
                            <span class="title">All Teacher</span>
                        </a>
                    </li>
                    <li>
                        <a href="/add-employee">
                            <span class="title">Add New Teacher</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-money-check"></i>
                    <span class="title">Fee</span>
                </a>
                <ul>
                    <li>
                        <a href="/fee-collect">
                            <span class="title">Fee Collect</span>
                        </a>
                    </li>
                    <li>
                        <a href="/fee-slip">
                            <span class="title">Fee Slip</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span class="title">Attendance</span>
                </a>
                <ul>
                    <li>
                        <a href="/marks-student-attendance">
                            <span class="title">Mark Students Attendance</span>
                        </a>
                    </li>
                    @can('admin')
                    <li>
                        <a href="/marks-employee-attendance">
                            <span class="title">Mark Employees Attendance</span>
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="/student-attendance-report">
                            <span class="title">Students Attendance Report</span>
                        </a>
                    </li>
                    @can('admin')
                    <li>
                        <a href="/employee-attendance-report">
                            <span class="title">Employees Attendance Report</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-book"></i>
                    <span class="title">Lesson Plan</span>
                </a>
                <ul>
                    <li>
                        <a href="/manage-lesson-plan">
                            <span class="title">Manage Lesson Plan</span>
                        </a>
                    </li>
                    <li>
                        <a href="/syllabus-status">
                            <span class="title">Manage Syllabus Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Lesson">
                            <span class="title">Lesson</span>
                        </a>
                    </li>
                    <li>
                        <a href="/Topic">
                            <span class="title">Topics</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span class="title">Exams</span>
                </a>
                <ul>
                    @can('admin')
                    <li>
                        <a href="/create-exam">
                            <span class="title">Create New Exams</span>
                        </a>
                    </li>
                    @endcan
                    <li>
                        <a href="/add-exam-marks">
                            <span class="title">Add / Update Exams Marks</span>
                        </a>
                    </li>
                    <li>
                        <a href="/result-cards">
                            <span class="title">Result Card</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span class="title">Test</span>
                </a>
                <ul>
                    <li>
                        <a href="/create-test">
                            <span class="title">Create Test</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
