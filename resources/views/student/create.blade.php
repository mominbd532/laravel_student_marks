@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-danger">
                        {{Session::get('message')}}
                    </div>

                @endif
                <div class="card">
                    <div class="card-header">Add New Student</div>

                    <div class="card-body">

                        <form action="{{route('student.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Student Name</label>
                                <input type="text" class="form-control"   placeholder="Enter Student Name" name="name">

                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('name'))
                                <div class="error" style="color: red">
                                    {{$errors->first('name')}}
                                </div>

                            @endif

                            <div class="form-group">
                                <label>Class</label>
                                <input type="number" class="form-control"  placeholder="Enter Student Class" name="class">
                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('class'))
                                <div class="error" style="color: red">
                                    {{$errors->first('class')}}
                                </div>

                            @endif
                            <div class="form-group">
                                <label>Roll</label>
                                <input type="number" class="form-control" placeholder="Enter Student Roll" name="roll">

                            </div>
                            {{--Error Exception--}}
                            @if($errors->has('roll'))
                                <div class="error" style="color: red">
                                    {{$errors->first('roll')}}
                                </div>

                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
