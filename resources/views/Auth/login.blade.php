<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            {{-- <div class="mt-8 md:mt-0 flex items-center">

                <a href="/register" class="text-s font-bold uppercase m-1">Register</a>
                <a href="/login" class="text-s font-bold uppercase m-2.5">log in</a>

            </div> --}}
        </nav>
        <div class="flex px-24">

            <div class="flex-1 font-semibold mt-16 py-10">
                <h1>Login</h1>
                <div class="mt-8">
                    <form method="POST" action="/login">
                        @csrf

                        <x-form.input name="email" type="email" />
                        <x-form.input name="password" type="password" />
                        <div class="float-right text-sm text-blue-600">
                            <a href="#">forget Password?</a>
                        </div>
                        <div>
                            <x-form.button>Login</x-form.button>
                        </div>
                        {{-- <div class="float-left text-sm text-blue-600 mt-4">
                            <span class="text-black">Not Registered Yet?</span>
                            <a href="#">Create an Account</a>
                        </div> --}}
                    </form>
                </div>
            </div>
            <div class="flex-1 mt-40 ml-auto block">
                <img id="demo" class="ml-auto" src="/images/home_1.png" width="90%">
            </div>

        </div>
    </section>
</body>
<script>
    var c = 1;
    setInterval(function() {
        document.getElementById("demo").src = "/images/home_" + c + ".png";
        if (c < 4) {
            c++;
        } else {
            c = 1;
        }
    }, 3000);
</script>

</html>
