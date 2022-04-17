
@extends('layouts.app2')

@section('content')


<div class="container">
   <br>
   <br>
    <!---------------------------------------------Form------------------------------------------------>

    <form method="post" action="{{route('addtotable.add',$student_id)}}">
        @csrf
    <div class="input-group mb-3">
    <label class="input-group-text" for="inputGroupSelect02">Courses</label>
      <select class="form-select" id="inputGroupSelect02" name="id">
      
        @foreach($Courses as $course)

        <option value="{{$course->id}}">{{$course->name}}</option>

        @endforeach
    
      </select>
      
    </div>
    <br>
      <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>

    <!-------------------------------------------------End form----------------------------------------->
    
    </div>



@endsection