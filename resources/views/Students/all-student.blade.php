<x-layout.bootstrap-layout>
    <div class="col-span-12 flex-col ">
        <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
        <form action="#" method="POST">
            <div class="flex p-2 bg-blue-100 flex-wrap">

                <div class="mb-6 mr-2">
                    <x-form.label name="Class" type="number" />
                    <select class="border border-gray-400 p-2.5 w-64" name="Class" id="Class">
                        <option value="class 1">Class 1</option>
                        <option value="class 2">Class 2</option>
                        <option value="class 3">Class 3</option>
                    </select>
                </div>
                <x-form.input name="Student Name" type="text" />
                <div class="mb-6 mr-2">
                    <button
                        class="bg-blue-600 hover:bg-blue-800 p-2.5 mt-11 w-32 rounded text-white uppercasae">Search</button>
                </div>
            </div>
        </form>
        <div class="grid grid-cols-12 bg-blue-200 border hover:shadow-2xl rounded-2xl shadow-md px-6 py-8">
            <div class="col-span-2 ">
                <img class="rounded" src="/images/illustration-1.png" width="100%" height="100%" />
            </div>
            <div class="col-span-3 col-start-5">
                <h4>Talha Tanveer</h4>
                <span><b>Admission No: </b> 123456</span><br>
                <span><b>Class: </b> 123456</span><br>
                <span><b>Date of Birth: </b> 10-10-2001</span><br>
                <span><b>Gender: </b> Male</span><br>


            </div>
            <div class="col-span-3 col-start-10">
                <span><b>Guardian Name: </b>Tanveer</span><br>
                <span><b>Guardian Phone: </b> 00-000-000</span><br>
                <span><b>Email: </b> talhatanvver930@gmail.com</span><br>
                <span><b>Current Address: </b> johar town 540 , lahore</span><br>
                <x-form.button>Show All Details</x-form.button>
            </div>
        </div>
    </div>
</x-layout.bootstrap-layout>
