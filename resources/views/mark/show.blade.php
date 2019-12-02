@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card">
                    <div class="card-header">

                        <div class="row">
                            <div class="col-md-8">
                                View Result
                            </div>
                            <div class="col-md-4">
                                <a href="">
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
                                CGPA:



                                 <P>{{$averageMarks}}%</P>
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
