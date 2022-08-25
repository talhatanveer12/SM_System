@props(['name', 'type' => 'text', 'from','upto','status'])
<x-particulars-form.form-input name="grade_name[]" value="{{$name}}" disable=true />
<x-particulars-form.form-input name="percent_from[]" value="{{$from}}" type="number" />
<x-particulars-form.form-input name="percent_upto[]" value="{{$upto}}" type="number" />
<x-particulars-form.form-input name="status[]" value="{{$status}}" />
