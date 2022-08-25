<x-layout.layout>
    <div class="col-span-10 flex-col ">
        <div class="bg-blue-200 border-b-2 border-black p-2">Student Admission</div>
        <div class="flex p-2 bg-blue-100 flex-wrap">
            <x-form.input name="Admission No" type="number" />
            <x-form.input name="Roll No" type="number" />
            <div class="mb-6 mr-2">
                <x-form.label name="Class" type="number" />
                <select class="border border-gray-400 p-2.5 w-64" name="Class" id="Class">
                    <option value="class 1">Class 1</option>
                    <option value="class 2">Class 2</option>
                    <option value="class 3">Class 3</option>
                </select>
            </div>
            <div class="mb-6 mr-2">
            <x-form.label name="Date of Birth"/>
            <input class="border border-gray-400 p-2 w-64" type="date" Date of Birth" id="Date of Birth"/>
            </div>
            <x-form.input name="First Name"/>
            <x-form.input name="Last Name"/>
            <div class="mb-6 mr-2">
                <x-form.label name="Gender" type="number" />
                <select class="border border-gray-400 p-2.5 w-64" name="Gender" id="Gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="mb-6 mr-2">
                <x-form.label name="Category" type="number" />
                <select class="border border-gray-400 p-2.5 w-64" name="Category" id="Category">
                    <option value="general">General</option>
                    <option value="special">Special</option>
                    <option value="obc">OBC</option>
                </select>
            </div>
        </div>
    </div>
</x-layout.layout>
