<a href="/adminDashboard" data-bs-parent="#sidebar"
    class=" text-truncate mt-2 focus-within:text-blue-500 text-decoration-none hover:text-blue-500 m-2 text-left text-black text-sm w-full">
    <div class="focus:text-blue-500 hover:text-blue-500 ">
        <i class="fa-solid fa-house"></i>
        <span class="pl-2">Dashboard</span>
    </div>
</a>
<x-sidebar.dropdown>
    <x-slot name="trigger">
        <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
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
        <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
            <i class="fa-solid fa-pen-to-square"></i>
            <span class="pl-2">Classes</span>
        </button>
    </x-slot>
    <x-sidebar.dropdown-item href="/all-classes">All Classes</x-sidebar.dropdown-item>
    {{-- <x-sidebar.dropdown-item href="#">Class Details</x-sidebar.dropdown-item> --}}
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
        <x-sidebar.dropdown-item href="/add-courses">Add Courses</x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/assign-courses">Assign Courses
        </x-sidebar.dropdown-item>
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
        <x-sidebar.dropdown-item href="/all-student">All Students</x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/add-student">Add New</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">Admission Letter</x-sidebar.dropdown-item> --}}
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
        <x-sidebar.dropdown-item href="/all-employee">All Employees</x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/add-employee">Add New</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">Job Letter</x-sidebar.dropdown-item> --}}
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
        <x-sidebar.dropdown-item href="/fee-collect">Fee Collect</x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/fee-slip">Fee Slip</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">fee defaulters</x-sidebar.dropdown-item> --}}
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
        <x-sidebar.dropdown-item href="/marks-student-attendance">Mark Students Attendance
        </x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/marks-employee-attendance">Mark Employees Attendance
        </x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/student-attendance-report">Students Attendance Report
        </x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/employee-attendance-report">Employees Attendance Report
        </x-sidebar.dropdown-item>
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
        <x-sidebar.dropdown-item href="/syllabus-status">Manage Syllabus Status
        </x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/Lesson">Lesson</x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/Topic">Topics</x-sidebar.dropdown-item>
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
        <x-sidebar.dropdown-item href="/create-exam">Create New Exams</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">Edit or Delete</x-sidebar.dropdown-item> --}}
        <x-sidebar.dropdown-item href="/add-exam-marks">Add / Update Exams Marks
        </x-sidebar.dropdown-item>
        <x-sidebar.dropdown-item href="/result-cards">Result Card</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">Exam Results</x-sidebar.dropdown-item> --}}
    </x-sidebar.dropdown>
</div>

<div class="flex items-center">
    <x-sidebar.dropdown>
        <x-slot name="trigger">
            <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                <i class="fa-solid fa-file-circle-check"></i>
                <span class="pl-2">Test</span>
            </button>
        </x-slot>
        <x-sidebar.dropdown-item href="/create-test">Create Test</x-sidebar.dropdown-item>
        {{-- <x-sidebar.dropdown-item href="#">Edit Tes</x-sidebar.dropdown-item> --}}
    </x-sidebar.dropdown>
</div>
