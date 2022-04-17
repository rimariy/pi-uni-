
@extends('layouts.app2')

@section('content')

<div class="container">
<!------------------------------------------------------------------------------------------------->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href='{{ route('addCourses.index') }}' class="btn btn-warning me-md-2" type="button">Add Courses</a>
</div>
<!------------------------------------------------------------------------------------------------->
</div>
<!---------------------------------------------table----------------------------------------------->
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course</th>
      <th scope="col">prof_name</th>
      <th scope="col"></th>
      <th scope="col"></th>



    </tr>
  </thead>
  <tbody>

    @foreach($Courses as $course)
      <tr>
        <th scope="row">{{$course['id']}}</th>
        <td>{{$course['name']}}</td>
        <td>{{$course['prof_name']}}</td>

        <td>
            <a href="{{route('Courses.edit',$course->id)}}" type="button" class="btn btn-success">Edit</a>
        </td>
        <td>
          <form action='{{route('deleteCourses',$course->id)}}' method="post" >
            @csrf
            <input type='hidden' value="delete" name='_method' >
            <button type="submit"  class="btn btn-danger">Delete</button>
          </form>
        </td>

      </tr>

      @endforeach
</table>
<br>


@endsection