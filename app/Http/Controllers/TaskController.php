<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($id)
    {
        $tasks = Task::all()->sortBy(['order','ASC'])->where('project_id',$id);
        $project=Project::findOrFail($id);
        return view('task',compact('tasks','project'));
    }

    public function update(Request $request)
    {
        $tasks = Task::all();

        foreach ($tasks as $task) {
            foreach ($request->order as $order) {
                if ($order['id'] == $task->id) {
                    $task->update(['order' => $order['position']]);
                }
            }
        }
        
        return response('Update Successfully.', 200);
    }






    // public function index($id)
    // {
    //     $data = Task::all()->where('project_id',$id);
    //     $project=Project::findOrFail($id);
    //     return view('Task')->with([
    //     'task'=>$data,
    //     'project'=>$project

    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create($id)
    {
        //
        return view('addTask')->with([
            'project_id'=>$id
        ]);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $Task=new Task();
        $Task->name=$validatedData['name'];
        $Task->project_id=$id;
        $Task->save();
        return back()->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // public function taskView($id)
    // {
    //     // $data = Task::all()->where('project_id',$id);
    //     $project=Project::findOrFail($id);
    //     // return view('Task')->with([
    //     // 'task'=>$data,
    //     // 'project'=>$project
    //     // ]);

    // 	$panddingItem = Task::where([['status','=',0],['project_id','=',$id]])
	// 	                    ->orderBy('order')
	// 						->get();
    // 	$completeItem = Task::where([['status','=',1],['project_id','=',$id]])
	// 	                    ->orderBy('order')
	// 						->get();

    // 	return view('Task',compact('panddingItem','completeItem','project'));
    // }
    

    
//     public function updateTask(Request $request)
//     {
//     	$input = $request->all();
        
// 		if(!empty($input['pending']))
//     	{
// 			foreach ($input['pending'] as $key => $value) {
// 				$key = $key + 1;
// 				Task::where('id',$value)
// 						->update([
// 							'status'=> 0,
// 							'order'=>$key
// 						]);
// 			}
// 		}
        
// 		if(!empty($input['accept']))
//     	{
// 			foreach ($input['accept'] as $key => $value) {
// 				$key = $key + 1;
// 				Task::where('id',$value)
// 						->update([
// 							'status'=> 1,
// 							'order'=>$key
// 						]);
// 			}
// 		}
//     	return response()->json(['status'=>'success']);
//     }
}
