<div class="sidebar-menu">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="/">
                    <img src="/images/logo.svg" width="120" alt="" />
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
        <ul id="main-menu" class="main-menu">
            <li class="{{'adminDashboard' == request()->path() ? 'active' : ''}}">
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
            <li class="has-sub {{Request::is('general-settings/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-gear"></i>
                    <span class="title">General Settings</span>
                </a>
                <ul>
                    @can('admin')
                    <li class="{{'general-settings/institute-profile' == request()->path() ? 'active' : ''}}">
                        <a href="/general-settings/institute-profile">
                            <span class="title">Institute</span>
                        </a>
                    </li>
                    <li class="{{'general-settings/fee-particulars' == request()->path() ? 'active' : ''}}">
                        <a href="/general-settings/fee-particulars">
                            <span class="title">Fee</span>
                        </a>
                    </li>
                    @endcan
                    <li class="{{'general-settings/marks-grading' == request()->path() ? 'active' : ''}}">
                        <a href="/general-settings/marks-grading">
                            <span class="title">Grading</span>
                        </a>
                    </li>
                    <li class="{{'general-settings/account-settings' == request()->path() ? 'active' : ''}}">
                        <a href="/general-settings/account-settings">
                            <span class="title">Account</span>
                        </a>
                    </li>
                </ul>
            </li>
            @can('admin')
            <li class="has-sub {{Request::is('class/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span class="title">Classes</span>
                </a>
                <ul>
                    <li class="{{'class/all-classes' == request()->path() ? 'active' : ''}}">
                        <a href="/class/all-classes">
                            <span class="title">All Classes</span>
                        </a>
                    </li>
                    <li class="{{'class/edit-delete-class' == request()->path() ? 'active' : ''}}">
                        <a href="/class/edit-delete-class">
                            <span class="title">Edit or Delete</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-sub {{Request::is('course/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-book-open"></i>
                    <span class="title">Courses</span>
                </a>
                <ul>
                    <li class="{{'course/add-courses' == request()->path() ? 'active' : ''}}">
                        <a href="/course/add-courses">
                            <span class="title">Add Courses</span>
                        </a>
                    </li>
                    <li class="{{'course/assign-courses' == request()->path() ? 'active' : ''}}">
                        <a href="/course/assign-courses">
                            <span class="title">Assign Courses</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="has-sub {{Request::is('student/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-user"></i>
                    <span class="title">Students</span>
                </a>
                <ul>
                    <li class="{{'student/all-student' == request()->path() ? 'active' : ''}}">
                        <a href="/student/all-student">
                            <span class="title">All Students</span>
                        </a>
                    </li class="{{'student/add-student' == request()->path() ? 'active' : ''}}">
                    @can('admin')
                    <li>
                        <a href="/student/add-student">
                            <span class="title">Add New Student</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @can('admin')
            <li class="has-sub {{Request::is('employee/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-briefcase"></i>
                    <span class="title">Teacher</span>
                </a>
                <ul>
                    <li class="{{'employee/all-employee' == request()->path() ? 'active' : ''}}">
                        <a href="/employee/all-employee">
                            <span class="title">All Teacher</span>
                        </a>
                    </li>
                    <li class="{{'employee/add-employee' == request()->path() ? 'active' : ''}}">
                        <a href="/employee/add-employee">
                            <span class="title">Add New Teacher</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="has-sub {{Request::is('fee/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-money-check"></i>
                    <span class="title">Fee</span>
                </a>
                <ul>
                    <li class="{{'fee/fee-collect' == request()->path() ? 'active' : ''}}">
                        <a href="/fee/fee-collect">
                            <span class="title">Fee Collect</span>
                        </a>
                    </li>
                    <li class="{{'fee/fee-slip' == request()->path() ? 'active' : ''}}">
                        <a href="/fee/fee-slip">
                            <span class="title">Fee Slip</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endcan
            <li class="has-sub {{Request::is('attendance/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-clipboard-user"></i>
                    <span class="title">Attendance</span>
                </a>
                <ul>
                    <li class="{{'attendance/marks-student-attendance' == request()->path() ? 'active' : ''}}">
                        <a href="/attendance/marks-student-attendance">
                            <span class="title">Mark Students Attendance</span>
                        </a>
                    </li>
                    @can('admin')
                    <li class="{{'attendance/marks-employee-attendance' == request()->path() ? 'active' : ''}}">
                        <a href="/attendance/marks-employee-attendance">
                            <span class="title">Mark Employees Attendance</span>
                        </a>
                    </li>
                    @endcan
                    <li class="{{'attendance/student-attendance-report' == request()->path() ? 'active' : ''}}">
                        <a href="/attendance/student-attendance-report">
                            <span class="title">Students Attendance Report</span>
                        </a>
                    </li>
                    @can('admin')
                    <li class="{{'attendance/employee-attendance-report' == request()->path() ? 'active' : ''}}">
                        <a href="/attendance/employee-attendance-report">
                            <span class="title">Employees Attendance Report</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            <li class="has-sub {{Request::is('lesson/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-book"></i>
                    <span class="title">Lesson Plan</span>
                </a>
                <ul>
                    <li class="{{'lesson/manage-lesson-plan' == request()->path() ? 'active' : ''}}">
                        <a href="/lesson/manage-lesson-plan">
                            <span class="title">Manage Lesson Plan</span>
                        </a>
                    </li>
                    <li class="{{'lesson/syllabus-status' == request()->path() ? 'active' : ''}}">
                        <a href="/lesson/syllabus-status">
                            <span class="title">Manage Syllabus Status</span>
                        </a>
                    </li>
                    <li class="{{'lesson/Lesson-list' == request()->path() ? 'active' : ''}}">
                        <a href="/lesson/Lesson-list">
                            <span class="title">Lesson</span>
                        </a>
                    </li>
                    <li class="{{'lesson/Topic' == request()->path() ? 'active' : ''}}">
                        <a href="/lesson/Topic">
                            <span class="title">Topics</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub {{Request::is('exam/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span class="title">Exams</span>
                </a>
                <ul>
                    @can('admin')
                    <li class="{{'exam/create-exam' == request()->path() ? 'active' : ''}}">
                        <a href="/exam/create-exam">
                            <span class="title">Create New Exams</span>
                        </a>
                    </li>
                    @endcan
                    <li class="{{'exam/add-exam-marks' == request()->path() ? 'active' : ''}}">
                        <a href="/exam/add-exam-marks">
                            <span class="title">Add / Update Exams Marks</span>
                        </a>
                    </li>
                    <li class="{{'exam/result-cards' == request()->path() ? 'active' : ''}}">
                        <a href="/exam/result-cards">
                            <span class="title">Result Card</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="has-sub {{Request::is('test/*') ? 'opened active':''}}">
                <a href="#">
                    <i class="fa-solid fa-file-circle-check"></i>
                    <span class="title">Test</span>
                </a>
                <ul>
                    <li class="{{'test/create-test' == request()->path() ? 'active' : ''}}">
                        <a href="/test/create-test">
                            <span class="title">Create Test</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>


