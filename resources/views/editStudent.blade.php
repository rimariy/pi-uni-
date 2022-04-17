
@extends('layouts.app2')

@section('content')

<div class="container">

<!---------------------------------------------Form------------------------------------------------>
<form method="post" action="{{route('updateStudent',$student->Id??1)}}">

    @csrf
    @method('PUT')


    <div class="mb-3">
      <label  class="form-label">Name</label>
      <input type="text" name="name"  value="{{$student->name}}" class="form-control" >
      @if ($errors->has('name'))
          <span class="text-danger">{{ $errors->first('name') }}</span>
      @endif
    </div>
  
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" name="email" value="{{$student->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
    @endif
  
    <div class="mb-3">
      <label  class="form-label">address</label>
      <input type="text" name="address" value="{{$student->address}}" class="form-control"  >
    </div>
    @if ($errors->has('address'))
        <span class="text-danger">{{ $errors->first('address') }}</span>
    @endif

  <button type="submit" class="btn btn-primary">Submit</button>
  
</form>
<!-------------------------------------------------End form------------------------------------------------>

</div>
@endsection