<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassroomsController extends Controller
{
    //

    public function index()
    {
        $classrooms = Classroom::all();

        return view('classrooms', compact('classrooms'));
    }
    public function showClassInfo($id){
        $classroom = Classroom::find($id);
        $students =  Student::where("classroom_id",$id)->get();
    
         $teachers = Teacher::where("classroom_id",$id)->get();
      
        return view("classroomInfo", compact("classroom","students","teachers"));
       
    }

    public function store(Request $req)
    {

    $req->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'capacity' => 'required|integer|min:1',
    ]);

    $classRoom = new Classroom;
    $classRoom->name = $req->name;
    $classRoom->description = $req->description;
    $classRoom->capacity = $req->capacity;
    $classRoom->save();

    return redirect('/dashboard/classrooms');

    }


    public function delete($id){
     Classroom::find($id)->delete();
        return redirect('/dashboard/classrooms/');
    }

    public function edit(Request $req, $id ){
        $classroom = Classroom::find($id);
        $classroom->name = $req->name;
        $classroom->description = $req->description;
        $classroom->capacity = $req->capacity;
        $classroom->save();
        return redirect('/dashboard/classrooms/one/'.$id);
    }
}
