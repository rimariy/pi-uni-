<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;
use App\Models\students;
use App\Models\Studentstable;

class studentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Students::all();
        $course =Courses::all();
        return view('Student')->with([
        'students'=>$data ,
        'course'=>$course ,
        ]);

    }

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addStudent');
    }

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
            'email' => 'required|email|unique:users',
            'address'=>'required',
            'password' => 'required|min:5'

        ], [
            'name.required' => 'Name is required',
            'password.required' => 'Password is required'
        ]);

    $validatedData['password'] = bcrypt($validatedData['password']);
    $student = Students::create($validatedData);
  
    return back()->with('success', 'User created successfully.');

        // $student = new Students();
        // $student->Name=$request->name;
        // $student->email=$request->email;
        // $student->address=$request->address;
        // $student->Password=$request->password;
        // $student->save();
        // return redirect('/student');
        
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

    public function addStudentCourses(Request $request,$id)
    {
        
       
        $row=new Studentstable();
        $row->studentID=$id;
        $row->coursID=$request->id;
        $row->save();
        return redirect('/student');


        
       

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Students::findOrFail($id);
        return view('editStudent', compact('student'));
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
            'email' => 'required|email|unique:users',
            'address'=>'required',

        ], [
            'name.required' => 'Name is required'
        ]);

     Students::where('id',$id)->update($validatedData);
  
    return back()->with('success', 'User created successfully.');

        // Students::where('id',$id)->update($request->all());
        
        // return redirect('/student');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        Students::where('id',$id)->delete();
       
        return redirect('/student');
        //
    }
}
