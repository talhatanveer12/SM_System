<x-layout.bootstrap-layout>
    <div class="col">
        <div class="row">
            <div class="col-span-12 flex-col ">
                <div class="bg-blue-200 border-t-2 border-black p-2">Select Criteria </div>
                <div class="flex p-2 bg-blue-100 flex-wrap ">
                    <form action="#" method="GET">
                        <div class='flex'>
                            <x-form.input name="roll_no" type="number" value="{{ request('roll_no') }}" />
                            <x-form.input name="date" type="date" value="{{ request('date') }}" />
                            <div class=" mr-2 mt-3">
                                <button type="submit" class="btn btn-primary mt-4">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="/save-fee-collect" method="POST">
                @csrf
                {{-- <input class="form-control" type="date" name="fee_month"> --}}
                <button type="submit" class="btn btn-primary mt-4">save</button>
            </form>
        </div>
    </div>
</x-layout.bootstrap-layout>
