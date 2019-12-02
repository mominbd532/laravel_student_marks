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
        return view('mark.create',compact('student'));

    }

    public function store(Request $request){
        Mark::create([
            'studentId' =>request('studentId'),
            'subjectId' =>request('subjectId'),
            'mark' =>request('mark'),
        ]);
        return redirect()->back();
    }

    public function show($id){
        $student =Student::findOrFail($id);
        $marks =Mark::where('studentId',$id)->get();
        $averageMarks =Mark::where('studentId',$id)->avg('mark');
        $checkMarks =Mark::select('mark')->where('studentId',$id)->get();

        return view('mark.show',compact('student','marks','averageMarks','checkMarks'));
    }

}
