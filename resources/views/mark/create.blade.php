@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
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
                <div class="card">
                    <div class="card-header">
                        Old Result
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped css-serial">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>Action</th>

                            </tr>

                            </thead>

                            <tbody>
                            @foreach($marks as $mark)


                                <tr>
                                    <td></td>
                                    <td>
                                        @foreach(App\Subject::all() as $sub)

                                            {{$mark->subjectId=="$sub->id" ? "$sub->subName":""}}
                                        @endforeach
                                    </td>
                                    <td>{{$mark->mark}}</td>
                                    <td>
                                        <a href="{{route('mark.destroy',[$mark->id])}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </td>


                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
