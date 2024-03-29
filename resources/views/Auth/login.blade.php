<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        body {
            background-image: url("images/background1.jpeg");
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="align-items-center justify-content-center row vh-100">
            <div class="bg-white col-lg-4 col-md-6 col-sm-8 p-4 rounded shadow">
                <div class="mb-4 row text-center">
                    <h1>Login</h1>
                </div>
                @if ($errors->any() && $retries > 0)
                    <div class="alert alert-warning text-sm-center" role="alert">
                        Remaining {{ $retries }} attempt.
                    </div>
                @endif
                @if ($retries <= 0)
                    <div class="alert alert-danger text-sm-center" role="alert">
                        Please try again after {{ $seconds }} seconds.
                    </div>
                @endif
                <form method="POST" action="/login">
                    @csrf
                    <x-form.input name="email" type="email" />
                    <x-form.input name="password" type="password" />
                    <div class="float-end mb-4">
                        <a class="text-decoration-none" href="/forgot-password">forget password</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
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
