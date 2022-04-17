
@extends('layouts.app2')

@section('content')

<div class="container">
<!---------------------------------------------Form------------------------------------------------>
<form method="post" action="addStudent">
   @csrf
  <div class="mb-3">
    <label  class="form-label">Name</label>
    <input type="text" name="name" class="form-control" >
    @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
    @endif
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first('email') }}</span>
  @endif

  <div class="mb-3">
    <label  class="form-label">address</label>
    <input type="text" name="address" class="form-control"  >
  </div>
  @if ($errors->has('address'))
      <span class="text-danger">{{ $errors->first('address') }}</span>
  @endif

  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  @if ($errors->has('password'))
    <span class="text-danger">{{ $errors->first('password') }}</span>
  @endif

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-------------------------------------------------End form------------------------------------------------>

@endsection