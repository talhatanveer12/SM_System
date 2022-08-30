@component('mail::message')
# hi {{$name}},
# Welcome to SM intitute

your account credentials <br>
<b>Roll No :</b>  {{$roll_no}} <br>
<b>Password :</b> {{$password}}

@component('mail::button', ['url' => 'http://127.0.0.1:8001/'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
