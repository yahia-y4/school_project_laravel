<?php

namespace App\Http\Controllers;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();
        $classrooms = Classroom::all();
        return view('students', compact('students','classrooms'));
    }

    public function store(Request $request){

        $std = new Student();
        $std->name = $request->name;
        $std->email = $request->email;
        $std->phone = $request->phone;
        $std->birth_date = $request->birth_date;
        $std->classroom_id = $request->classroom_id;
        $std->save();
        return redirect('/dashboard/students');

    }

    public function deleteStd($id){
        Student::find($id)->delete();
        return redirect('/dashboard/students');
    }

    public function editStd(Request $request, $id){
      $std = Student::find($id);
      if($std ){
      $std->name = $request->name;
      $std->email = $request->email;
      $std->phone = $request->phone;
      $std->birth_date = $request->birth_date;
      $std->classroom_id = $request->classroom_id;
      $std->save();
      return redirect('/dashboard/students/');
      }
     return redirect('/dashboard/students/');
    } 
}
