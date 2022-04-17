@extends('layouts.app2')

@section('content')

<div class="container">

<!---------------------------------------------Form------------------------------------------------>

<form method="post" action=" {{route('addProject.add',['id'=>$id,'id2'=>$Student_id])}}">

    @csrf
 
    <div class="mb-3">
     <label  class="form-label">Project Name </label>
     <input type="text" name="name" class="form-control" >
     @if ($errors->has('name'))
         <span class="text-danger">{{ $errors->first('name') }}</span>
     @endif
   </div>

   <button type="submit" class="btn btn-primary">Submit</button>
 </form>

<!-------------------------------------------------End form------------------------------------------------>


@endsection
