<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/b0ca48d263.js" crossorigin="anonymous"></script>
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Document</title>
</head>

<body>
    <section class="px-6">
        <x-navbar.navbar-menu />
    </section>
    <div class="grid lg:grid-cols-12 md:grid-cols-8 sm:grid-cols-4">
        <x-sidebar.sidebar-menu />
        {{ $slot }}
    </div>
    <x-flash />
</body>
{{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script> --}}

</html>


<!-- <div class="mb-6 mr-2">
    <x-form.label name="{{$name}}"/>
    <input class="border border-gray-400 p-2 w-full" type="{{$type}}" placeholder="Enter your {{$placeholder}} {{ucwords($name)}}" name="{{$name}}" id='{{$name}}'  {{$attributes(['value' => old($name)])}} value='{{$value}}'/>
    <x-form.error name="{{$name}}"/>
</div> -->

<!-- <label class="block font-bold mb-2 mt-3 text-black-900 text-gray-700 text-sm uppercase" for="{{$name}}">{{$name}}<sup class="text-blue-600">*</sup></label>
 -->