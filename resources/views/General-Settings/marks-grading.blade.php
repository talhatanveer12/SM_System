<x-layout.layout>
    <div class="bg-blue-200 col-span-8 lg:col-start-4 md:col-start-3 sm:col-start-2 border hover:shadow-2xl rounded-2xl shadow-md">
        <section class="px-6 py-8">
            <h1>Change Marks Grading</h1>
            <div class="grid gap-2 grid-cols-4 mt-4">
                <h2>Grade Name</h2>
                <h2>Percent From</h2>
                <h2>Percent Upto</h2>
                <h2>Status</h2>
                <form method="POST" action="/marks-grading/update" class="grid gap-2 grid-cols-4 col-span-4" >
                    @csrf

                    @foreach ($MarksGrading as $marksGrading)
                        <x-marks-grading.marks-main name="{{ $marksGrading->grade_name }}" from="{{ $marksGrading->percent_from }}" upto="{{ $marksGrading->percent_upto }}" status="{{ $marksGrading->status }}" />
                    @endforeach

                    <x-form.button>Save Changes</x-form.button>
                </form>
        </section>
    </div>
</x-layout.layout>
