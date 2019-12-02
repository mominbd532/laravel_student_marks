<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        Student::create([
            'name' =>request('name'),
            'class' =>request('class'),
            'roll' =>request('roll'),
        ]);

        return redirect()->to('/student/index')->with('message','Student Added Successfully');
    }

    public function index(){
        $students = Student::latest()->paginate(10);
        return view('student.show',compact('students'));
    }

    public function edit($id){
        $student =Student::findOrFail($id);
        return view('student.edit',compact('student'));
    }

    public function update(Request $request, $id){
        $student =Student::findOrFail($id);
        $student->name =request('name');
        $student->class =request('class');
        $student->roll =request('roll');
        $student->save();
        return redirect()->to('/student/index')->with('message','Student Updated Successfully');

    }

    public function destroy($id){
        $student =Student::findOrFail($id);
        $student->delete();
        return redirect()->to('/student/index')->with('message1','Student Delete Successfully');

    }



}
