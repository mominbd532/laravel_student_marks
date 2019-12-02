@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add New Subject</div>

                    <div class="card-body">

                        <form action="{{route('subject.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Subject Name</label>
                                <input type="text" class="form-control"   placeholder="Enter Subject Name" name="subName">

                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
