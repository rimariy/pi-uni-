@extends('layouts.app2')

@section('content')


<div class="container">

<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href='{{ route('addTask.index',$project->id) }}' class="btn btn-warning me-md-2" type="button">Add Task</a>
</div>

<br>

<div class="row">
    <div class="col-md-12">
        <h2 class="text-center pb-3 pt-1">This is Tasks for ({{$project->title}}) Project</h2>
        <div class="row">
            <div class="col-md-10 p-3 offset-md-1">
              <table id="table" class="table table-bordered">
                
                  <thead>
                    <tr>
                      <th width="30px">#</th>
                      <th>Title</th>
                    </tr>
                  </thead>
                  <tbody id="tablecontents">
                  {{-- <ul class="list-group shadow-lg connectedSortable" id="tablecontents"> --}}
                  {{-- @if(!empty($panddingItem) && $panddingItem->count()) --}}
                  @foreach($tasks as $task)
                    <tr class="row1" data-id="{{ $task->id }}">
                      <td class="pl-3"><i class="fa fa-sort"></i></td>
                      <td class="tdcolor">{{ $task->name }}</td>
                      {{-- @foreach($panddingItem as $key => $value) --}}
                      {{-- <li class="list-group-item" data-id="{{ $task->id }}">{{ $task->name }}</li> --}}
                    </tr>
                  @endforeach
                </tbody>                  
              </table>
                  {{-- @endif --}}
                {{-- </ul> --}}

            </div>
            <h5  class="col-md-10 p-3 offset-md-1">Drag and Drop the table rows and <button class="btn btn-success btn-sm" onclick="window.location.reload()">REFRESH</button> the page to check the Demo.</h5> 

        </div>
    </div>
  </div>



{{-- <div class="row">
<ul id="sortable" class="">
    @foreach($task as $t)


    <li class="ui-state-default "><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
      
         {{$t->name}}

    </li>
    @endforeach

  </ul>
</div>

</div> --}}
@endsection