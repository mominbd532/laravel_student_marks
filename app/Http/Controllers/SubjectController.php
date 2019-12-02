<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create(){
        return view('subject.create');
    }

    public function store(Request $request){
        Subject::create([
            'subName' =>request('subName'),
        ]);
        return redirect()->to('/subject/index')->with('message','Subject Added Successfully');
    }

    public function index(){
        $subjects =Subject::latest()->paginate(10);
        return view('subject.show',compact('subjects'));
    }

    public function edit($id){
        $subject =Subject::findOrFail($id);
        return view('subject.edit',compact('subject'));
    }

    public function update(Request $request,$id){
        $subject =Subject::findOrFail($id);
        $subject->subName =request('subName');
        $subject->save();
        return redirect()->to('/subject/index')->with('message','Subject Update Successfully');

    }

    public function destroy($id){
        $subject =Subject::findOrFail($id);
        $subject->delete();
        return redirect()->to('/subject/index')->with('message1','Subject Deleted Successfully');

    }
}
