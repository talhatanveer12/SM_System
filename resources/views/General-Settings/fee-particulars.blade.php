<x-layout.bootstrap-layout>
    <div class="col-span-12 col-span-8 lg:col-span-8 lg:col-start-3 md:col-start-3 sm:col-start-2">

        <div class="bg-blue-200 border hover:shadow-2xl rounded-2xl shadow-md">
            <section class="px-6 py-8">
                <h5>Change Fee Particular </h5>
                <div class="grid grid-cols-3 gap-2">
                    <div class="col-span-2 mt-4">
                        <h5>Particular Name</h5>
                    </div>
                    <div class="mt-4">
                        <h5>Prefix Amount</h5>
                    </div>
                    <form class="gap-2 grid grid-cols-3 col-span-3" method="POST" action="/update">
                        @csrf
                        @foreach ($Particulars as $particular)
                            <x-particulars-form.form-body>
                                <x-slot name="leftside">
                                    <x-particulars-form.form-input name="fee_particulars[]"
                                        value='{{ $particular->particular_name }}' />
                                </x-slot>
                                <x-slot name="rightside">
                                    <x-particulars-form.form-input name="prefix_amount[]" type="number"
                                        value='{{ $particular->prefix_amount }}' />
                                </x-slot>
                            </x-particulars-form.form-body>
                        @endforeach
                        {{-- <x-particulars-form.form-main name="fee_particulars" value="REGISTRATION FEE"/> --}}
                        {{-- <x-particulars-form.form-main name="fee_particulars" value="REGISTRATION FEE" />
                    <x-particulars-form.form-main name="fee_particulars" value="ART MATERIAL" />
                    <x-particulars-form.form-main name="fee_particulars" value="TRANSPORT" />
                    <x-particulars-form.form-main name="fee_particulars" value="BOOKS" />
                    <x-particulars-form.form-main name="fee_particulars" value="UNIFORM" />
                    <x-particulars-form.form-main name="fee_particulars" value="FINE" />
                    <x-particulars-form.form-main name="fee_particulars" value="OTHERS" /> --}}
                        <x-form.button>Save Changes</x-form.button>
                    </form>
                </div>
            </section>
        </div>

    </div>
</x-layout.bootstrap-layout>
