@component('mail::message')
# hi {{$name}},
# Welcome to {{session('institute_name')}}

your account credentials <br>
<b>Roll No :</b>  {{$roll_no}} <br>
<b>Password :</b> {{$password}}

@component('mail::button', ['url' => config('app.url')])
Login
@endcomponent

Thanks,<br>
{{session('institute_name')}}
@endcomponent
