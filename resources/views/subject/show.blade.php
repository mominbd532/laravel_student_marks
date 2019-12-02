@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
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
                    <div class="card-header">All Subject Information
                        <a href="{{route('subject.create')}}" style="margin-left: 200px">
                            <button class="btn btn-primary">Add Subject</button>
                        </a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped css-serial">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Subject Name</th>
                                <th>Actions</th>

                            </tr>

                            </thead>

                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td></td>
                                    <td>{{$subject->subName}}</td>

                                    <td>
                                        <a href="{{route('subject.edit',[$subject->id])}}">
                                            <button class="btn btn-warning">Edit</button>
                                        </a>
                                        <a href="{{route('subject.destroy',[$subject->id])}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$subjects->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
