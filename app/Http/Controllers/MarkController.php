<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function create($id){
        $student =Student::findOrFail($id);
        $marks =Mark::where('studentId',$id)->get();
        return view('mark.create',compact('student','marks'));

    }

    public function store(Request $request){
        $this->validate($request,[

            'mark' =>'required|integer|min:1|max:100',

        ]);

        $checkStuSub =Mark::where('studentId',$request->studentId)->where('subjectId',$request->subjectId)->get();
        $checkCount =$checkStuSub->count();



        if(!$checkCount > 0){
            Mark::create([
                'studentId' =>request('studentId'),
                'subjectId' =>request('subjectId'),
                'mark' =>request('mark'),
            ]);
            return redirect()->back()->with('message','Student Marks Add successfully');
        }
        else{
            return redirect()->back()->with('message1','Subject Already Exists');
        }

    }

    public function show($id){
        $student =Student::findOrFail($id);
        $marks =Mark::where('studentId',$id)->get();
        $averageMarks =Mark::where('studentId',$id)->avg('mark');
        $checkMarks =Mark::where('studentId',$id)->where('mark','<',40)->get();
        $checkCount =$checkMarks->count();

        return view('mark.show',compact('student','marks',
            'averageMarks','checkCount'));
    }

    public function destroy($id){
        $marks =Mark::findOrFail($id);
        $marks->delete();
        return redirect()->back()->with('message1','Subject Deleted Successfully');

    }

}
