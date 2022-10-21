<x-layout.layout>
    <div class="row">
        <div class="col-lg-7 col-md-6">

            {{-- Update institute logo  --}}
            <section class="px-6 py-8">
                <div class="row bg-gray-200 flex border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                    <div class="col-lg-8">
                        <h3>Update Institute Logo Here</h3>
                        <form method="POST" action="/api/updatelogo/{{ $Institute->id }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">File Select</label>
                                <div>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="input-group">
                                            <div class="form-control uneditable-input" data-trigger="fileinput">
                                                <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file color">
                                                <span class="fileinput-new">Select file</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="logo">
                                            </span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-span-5">
                                <button class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
                    <div class="col-lg-4">
                        <img src={{ $Institute->logo ? '/storage/' . $Institute->logo : '/images/illustration-1.png'}} width="100%" height="100%" />
                    </div>
            </section>

            {{-- update / add institute detail --}}
            <section class="px-6 py-8">
                <div class="bg-gray-200  flex border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                    <div class="w-full">
                        <h5>Update Institute Info Here</h5>
                        <form method="POST" action="/api/update/{{ $Institute->id }}">
                            @csrf
                            <x-form.input name="name" value='{{ $Institute->name }}' />
                            <x-form.input name="email" type="email" value='{{ $Institute->email }}' />
                            <x-form.input name="phone" type="number" value='{{ $Institute->phone }}' />
                            <x-form.input name="website" type="url" value='{{ $Institute->website }}' />
                            <x-form.input name="address" type="text" value='{{ $Institute->address }}' />
                            <x-form.button>Update</x-form.button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        {{-- display institute detail  --}}
        <div class="col-lg-5 col-md-6">
            <section class="px-6 py-8">
                <div
                    class="bg-gray-200  flex flex-col items-center border hover:shadow-2xl px-6 py-8 rounded-2xl shadow-md">
                    <img src={{ $Institute->logo ? '/storage/' . $Institute->logo : '/images/illustration-1.png'}} width="50%" height="50%" />
                    <h3>{{ $Institute->name }}</h3>
                    <span class="border border-b-0 mt-2 mb-2 w-full"></span>
                    <div class="container-fluid flex items-center justify-between">
                        <i class="fa-solid fa-envelope"></i>
                        <span class="pl-3">{{ $Institute->email }}</span>
                    </div>
                    <div class="container-fluid flex items-center justify-between">
                        <i class="fa-brands fa-internet-explorer"></i>
                        <span class="pl-3">{{ $Institute->website ?? 'www.institute.com' }}</span>
                    </div>
                    <div class="container-fluid flex items-center justify-between">
                        <i class="fa-solid fa-phone"></i>
                        <span class="pl-3">{{ $Institute->phone ?? '0300-0000-000' }}</span>
                    </div>
                    <span class="border border-b-0 mt-2 mb-2 w-full"></span>
                    <i class="fa-solid fa-location-dot"></i>
                    <p>{{ $Institute->address ?? 'Johar Town lahore, pakistan' }}</p>
                </div>
            </section>
        </div>
    </div>
</x-layout.layout>
