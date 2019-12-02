@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Student</div>

                    <div class="card-body">

                        <form action="{{route('student.update',[$student->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" class="form-control"   placeholder="Enter Student Name" name="name" value="{{$student->name}}">

                            </div>
                            <div class="form-group">
                                <label>Class</label>
                                <input type="number" class="form-control"  placeholder="Enter Student Class" name="class" value="{{$student->class}}">
                            </div>
                            <div class="form-group">
                                <label>Roll</label>
                                <input type="number" class="form-control" placeholder="Enter Student Roll" name="roll" value="{{$student->roll}}">

                            </div>
                            <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
