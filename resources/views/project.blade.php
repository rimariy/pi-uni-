
@extends('layouts.app2')

@section('content')

<div class="container">
    <!------------------------------------------------------------------------------------------------->
    
    {{-- @foreach($Student as $Stu) --}}

    <h3>Student Names {{$student->name}}</h3>

    <!---------------------------------------------table----------------------------------------------->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>  
          <th scope="col">Course</th>
          <th scope="col">Project title</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
    
        @foreach($student->courses as $course)


       <tr>
            <td>{{$course->id}}</td>

            <td>{{$course->name}}</td>

               
               <td>
                {{$course->project()->where('student_id',$student->Id)->first()->title??null}}
               @if(!$course->project()->where('student_id',$student->Id)->first())
                <a href="{{(!$course->project()->where('student_id',$student->Id)->first()? route('addProject.index',['id'=>$course->id,'id2'=>$student->Id]):'#')}}" class="link-secondary">Add project</a>
                @endif
               </td>
               <td>
                @if($course->project()->where('student_id',$student->Id)->first())
                <a href="{{($course->project()->where('student_id',$student->Id)->first()? route('Task.index',$course->project()->where('student_id',$student->Id)->first()->id):'#')}}" class="btn link-success">Show Tasks</a>
                @endif
               </td>
               
             
        </tr>
        @endforeach
    
    </table>
    {{-- @endforeach --}}

</div>
@endsection