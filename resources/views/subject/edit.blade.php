@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Update Subject</div>

                    <div class="card-body">

                        <form action="{{route('subject.update',[$subject->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Subject Name</label>
                                <input type="text" class="form-control" name="subName" value="{{$subject->subName}}">

                            </div>

                            {{--Error Exception--}}
                            @if($errors->has('subName'))
                                <div class="error" style="color: red">
                                    {{$errors->first('subName')}}
                                </div>

                            @endif

                            <button type="submit" class="btn btn-info">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
