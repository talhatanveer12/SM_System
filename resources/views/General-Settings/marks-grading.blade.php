<x-layout.layout>
    <div class="col">
        <div class="row justify-content-md-center">
            <div class="col-lg-2"></div>
            <div class=" col-md-8">
                <div class="bg-gray-200 border hover:shadow-2xl rounded-2xl shadow-md">
                    <section class="px-6 py-8">
                        <h5>Change Marks Grading</h5>
                        <div class="grid gap-2 grid-cols-4 mt-4">
                            <h6>Grade Name</h6>
                            <h6>Percent From</h6>
                            <h6>Percent Upto</h6>
                            <h6>Status</h6>
                            <form method="POST" action="/marks-grading/update" class="grid gap-2 grid-cols-4 col-span-4">
                                @csrf

                                @foreach ($MarksGrading as $marksGrading)
                                    <x-marks-grading.marks-main name="{{ $marksGrading->grade_name }}"
                                        from="{{ $marksGrading->percent_from }}"
                                        upto="{{ $marksGrading->percent_upto }}" status="{{ $marksGrading->status }}" />
                                @endforeach

                                <button type="submit" class="btn btn-primary ">Save Changes</button>
                            </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>
