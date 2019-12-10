@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-10">
                                View Result
                            </div>
                            <div class="col-md-2">
                                <a href="{{url('/student/index')}}">
                                    <button class="btn btn-primary">Go Back</button>
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                Name: {{$student->name}}
                            </div>
                            <div class="col-md-6 text-right">
                                Class: {{$student->class}} Roll: {{$student->roll}}
                                CGPA:&nbsp;
                                @if($checkCount > 0)
                                    F&nbsp;({{$averageMarks}}%)
                                @else
                                    {{$averageMarks >= 80 ? "A+":($averageMarks >= 75 ? "A":($averageMarks >= 70 ? "A-":($averageMarks >= 65 ? "B+":($averageMarks >= 60 ? "B":($averageMarks >= 55 ? "B-":($averageMarks >= 50 ? "C+":($averageMarks >= 45 ? "C":($averageMarks >= 40 ? "D":"F"))))))))}}&nbsp;({{$averageMarks}}%)
                                @endif

                            </div>

                        </div>
                        <table class="table table-bordered table-striped css-serial">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>GPA</th>

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
                                    <td>{{$mark->mark >= 80 ? "A+":($mark->mark >= 75 ? "A":($mark->mark >= 70 ? "A-":($mark->mark >= 65 ? "B+":($mark->mark >= 60 ? "B":($mark->mark >= 55 ? "B-":($mark->mark >= 50 ? "C+":($mark->mark >= 45 ? "C":($mark->mark >= 40 ? "D":"F"))))))))}}</td>

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
