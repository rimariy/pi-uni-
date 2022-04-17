<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Project;



class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Courses::all();

        return view('Courses')->with([
        'Courses'=>$data,

        ]);
    }


   


    public function createAddToTable($id)
    {
        
        $data = Courses::all();
        return view('addtotable')->with([
        'Courses'=>$data,
        'student_id'=>$id
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCourses');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'prof_name' => 'required'
            

        ], [
            'name.required' => 'Name is required'
        ]);

    $course = Courses::create($validatedData);
    $project=new Project;
    $project->courses_id=$course->id;
    $project->student_id=1;
    $project->title='test';
    $project->save();


    return back()->with('success', 'User created successfully.');

        // $courses = new Courses();
        // $courses->name=$request->name;
        // $courses->prof_name=$request->prof_name;
        // $courses->save();
        // return redirect('/Courses');
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
        $courses = Courses::findOrFail($id);
        return view('editCourses', compact('courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->offsetUnset('_method');
        $request->offsetUnset('_token');

        $validatedData = $request->validate([
            'name' => 'required',
            'prof_name' => 'required'

        ], [
            'name.required' => 'Name is required'
        ]);

        Courses::where('id',$id)->update($validatedData);
  
        return back()->with('success', 'User created successfully.');

        // $request->offsetUnset('_method');
        // $request->offsetUnset('_token');

        // Courses::where('id',$id)->update($request->all());
        
        // return redirect('/Courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Courses::where('id',$id)->delete();
       
        return redirect('/Courses');
        //
    }
}
