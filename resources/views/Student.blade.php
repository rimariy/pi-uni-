
@extends('layouts.app2')

@section('content')

<div class="container">
<!------------------------------------------------------------------------------------------------->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href='{{ route('addStudent.index') }}' class="btn btn-warning me-md-2" type="button">Add Student</a>
</div>
<!------------------------------------------------------------------------------------------------->
</div>
<!---------------------------------------------table----------------------------------------------->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">address</th>
      <th scope="col">courses</th>
      <th scope="col"></th>
      <th scope="col"></th>



    </tr>
  </thead>
  <tbody>

    @foreach($students as $student)
    @if($student['Id'] == 1 )
    
    @else
      <tr>
        <th scope="row">{{$student['Id']}}</th>
        <td>
          <a href="{{route('Project.index',$student->Id)}}" type="button" class="btn btn-outline-light">
            {{$student['name']}}
          </a>
        </td>
        <td>{{$student['email']}}</td>
        <td>{{$student['address']}}</td>

        <td>
          {{-- @foreach($table as $t)
          @if($t->studentID === $student['Id'])
          <li>{{ $t->id }}</li>
          @endif
          @endforeach --}}
          @foreach($student->courses as $course)
          <li>{{$course->name}}</li>
          @endforeach
          <a href="{{route('addtotable.index',$student->Id)}}" class="btn link-success">Add Course</a>
        </td>

        <td>
            <a href="{{route('student.edit',$student->Id)}}" type="button" class="btn btn-success">Edit</a>
        </td>
        <td>    
            <form action='{{route('deleteStudent',$student->Id)}}' method="post" >
              @csrf
              <input type='hidden' value="delete" name='_method' >
              <button type="submit"  class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
      @endif
      @endforeach

</table>

@endsection