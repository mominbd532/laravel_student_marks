@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>

                @endif
                    @if(Session::has('message1'))
                        <div class="alert alert-danger">
                            {{Session::get('message1')}}
                        </div>

                    @endif
                <div class="card">
                    <div class="card-header">All Student Information
                        <a href="{{route('student.create')}}" style="margin-left: 550px">
                            <button class="btn btn-primary">Add Student</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped css-serial">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>Roll</th>
                                    <th>Actions</th>

                                </tr>

                            </thead>

                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td></td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->class}}</td>
                                    <td>{{$student->roll}}</td>
                                    <td>
                                        <a href="{{route('student.edit',[$student->id])}}">
                                            <button class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="{{route('student.destroy',[$student->id])}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                        <a href="{{route('mark.create',[$student->id])}}">
                                            <button class="btn btn-info">Add Result</button>
                                        </a>
                                        <a href="{{route('mark.show',[$student->id])}}">
                                            <button class="btn btn-success">View Result</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$students->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
