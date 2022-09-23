<x-layout.layout>
    <div class="col">
        <div class="row justify-content-md-center">
            <div class="col-lg-2"></div>
            <div class="col-md-8">

                <div class="bg-gray-200 border hover:shadow-2xl rounded-2xl shadow-md">
                    <section class="px-6 py-8">
                        <h3>Change Fee Particular </h3>
                        <div class="grid grid-cols-3 gap-2">
                            <div class="col-span-2 mt-4">
                                <h4>Particular Name</h4>
                            </div>
                            <div class="mt-4">
                                <h4>Prefix Amount</h4>
                            </div>
                            <form class="gap-2 grid grid-cols-2 col-span-3" method="POST" action="/api/update">
                                @csrf
                                <input type='hidden' name="id" value={{ $Particulars[0]->id }}>
                                <input class="form-control" type="text" name="admission fee"
                                    value="Admission Fee"disabled>
                                <input class="form-control" type="number" name="admission fee"
                                    value={{ $Particulars[0]->admission_fee }}>
                                <input class="form-control" type="text" name="registration fee"
                                    value="Registration Fee"disabled>
                                <input class="form-control" type="number" name="registration fee"
                                    value={{ $Particulars[0]->registration_fee }}>
                                <input class="form-control" type="text" name="books" value="Books Fee"disabled>
                                <input class="form-control" type="number" name="books"
                                    value={{ $Particulars[0]->books }}>
                                <input class="form-control" type="text" name="uniform" value="Uniform Fee"disabled>
                                <input class="form-control" type="number" name="uniform"
                                    value={{ $Particulars[0]->uniform }}>
                                <input class="form-control" type="text" name="fine" value="Fine"disabled>
                                <input class="form-control" type="number" name="fine"
                                    value={{ $Particulars[0]->fine }}>
                                <input class="form-control" type="text" name="other" value="Other"disabled>
                                <input class="form-control" type="number" name="other"
                                    value={{ $Particulars[0]->other }}>
                                <input class="form-control" type="text" name="per course fee"
                                    value="Per Course Fee"disabled>
                                <input class="form-control" type="number" name="per course fee"
                                    value={{ $Particulars[0]->per_course_fee }}>
                                <button type="submit" class="btn btn-primary ">Save Changes</button>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-layout.layout>
