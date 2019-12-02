@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Student Result</div>

                    <div class="card-body">

                        <p>Student Name: {{$student->name}}</p>
                        <p>Student Class: {{$student->class}}</p>
                        <p>Student Roll: {{$student->roll}}</p>


                        <form action="{{route('mark.store')}}" method="post">
                            @csrf

                            <input type="hidden" value="{{$student->id}}" name="studentId">

                            <div class="form-group">
                                <label>Select Subject:</label>
                                <select name="subjectId" class="form-control">
                                    @foreach(\App\Subject::all() as $sub)
                                    <option value="{{$sub->id}}">{{$sub->subName}}</option>
                                        @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label>Marks:</label>
                                <input type="number" class="form-control" placeholder="Enter Marks" name="mark">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
