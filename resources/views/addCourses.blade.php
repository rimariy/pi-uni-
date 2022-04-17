
@extends('layouts.app2')

@section('content')

<div class="container">
<!---------------------------------------------Form------------------------------------------------>
<form method="post" action="addCourses">

   @csrf

   <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="name" class="form-control" >
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  <div class="mb-3">
    <label  class="form-label">prof_name</label>
    <input type="text" name="prof_name" class="form-control" >
    @if ($errors->has('prof_name'))
        <span class="text-danger">{{ $errors->first('prof_name') }}</span>
    @endif
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-------------------------------------------------End form------------------------------------------------>

@endsection