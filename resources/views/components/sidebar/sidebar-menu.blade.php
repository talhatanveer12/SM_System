<div class="col-span-2 md:col-span-2 sm:col-span-1">
    <div class="px-6 ">
        <p>menu</p>
        <div class="mb-2 mt-2">
            <a href="/adminDashboard" class="mt-2 focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                <i class="fa-solid fa-house"></i>
                <span class="pl-2">Dashboard</span>
            </a>
        </div>
        <div class="flex items-center">
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
        </div>

        <div class="flex items-center">
            <x-sidebar.dropdown>
                <x-slot name="trigger">
                    <button class="focus-within:text-blue-500 hover:text-blue-500 m-2 text-left text-sm w-full">
                        <i class="fa-solid fa-pen-to-square"></i>
                        <span class="pl-2">Classes</span>
                    </button>
                </x-slot>
                <x-sidebar.dropdown-item href="/all-classes">All Classes</x-sidebar.dropdown-item>
                <x-sidebar.dropdown-item href="#">New Class</x-sidebar.dropdown-item>
                <x-sidebar.dropdown-item href="/edit-delete-class">Edit or Delete</x-sidebar.dropdown-item>
            </x-sidebar.dropdown>
        </div>

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
                <x-sidebar.dropdown-item href="#">All Students</x-sidebar.dropdown-item>
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

        {{-- <div class="flex items-center">
            <x-sidebar.dropdown>
                <x-slot name="trigger">
                    <button class="m-2 text-left text-sm w-full">
                        <i class="fa-solid fa-file-invoice"></i>
                        Accounts</button>
                </x-slot>
                <x-sidebar.dropdown-item href="#">Account Statement</x-sidebar.dropdown-item>
                <x-sidebar.dropdown-item href="#">Add Income</x-sidebar.dropdown-item>
                <x-sidebar.dropdown-item href="#">Add Expense</x-sidebar.dropdown-item>
            </x-sidebar.dropdown>
        </div> --}}

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
