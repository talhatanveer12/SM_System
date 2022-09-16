<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <style>
        body {
            background-image: url("/images/background1.jpeg");
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
                <h3>Reset Password</h3>
            </div>
            <form method="POST" action="/reset-password">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <x-form.input name="email" type="email" />
                <x-form.input name="password" type="password" />
                <x-form.input name="password confirmation" type="password" />
                <button type="submit" class="btn btn-primary w-100">Save</button>
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
