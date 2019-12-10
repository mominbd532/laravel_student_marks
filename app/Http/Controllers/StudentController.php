<?php

namespace App\Http\Controllers;

use App\Mark;
use Illuminate\Http\Request;
use App\Student;
use App\DB;

class StudentController extends Controller
{
    public function create(){
        return view('student.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>'required',
            'class' =>'required|integer|max:10',
            'roll' =>'required|integer|max:100',

        ]);

        $checkClassRoll =Student::where('class',$request->class)->where('roll',$request->roll)->get();
        $checkCount =$checkClassRoll->count();

        if(!$checkCount > 0){

            Student::create([
                'name' =>request('name'),
                'class' =>request('class'),
                'roll' =>request('roll'),
            ]);

            return redirect()->to('/student/index')->with('message','Student Added Successfully');

        }
        else {

            return redirect()->to('/student/create')->with('message','Roll is already exists in the class');

        }

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

        $this->validate($request,[
            'name' =>'required',
            'class' =>'required|integer|max:10',
            'roll' =>'required|integer|max:100',

        ]);

        $checkClassRoll =Student::where('class',$request->class)->where('roll',$request->roll)->get();
        $checkCount =$checkClassRoll->count();

        if(!$checkCount > 0){

            $student =Student::findOrFail($id);
            $student->name =request('name');
            $student->class =request('class');
            $student->roll =request('roll');
            $student->save();
            return redirect()->to('/student/index')->with('message','Student information updated successfully');
        }
        else
        {
            $student =Student::findOrFail($id);
            $student->name =request('name');
            $student->save();
            return redirect()->to('/student/index')->with('message1','Roll & Class not updated, Because they are already exist');

        }

    }

    public function destroy($id){

        $student =Student::findOrFail($id);
        $student->delete();
        \DB::table('marks')->where('studentId',$id)->delete();

        return redirect()->to('/student/index')->with('message1','Student Delete Successfully');

    }



}
