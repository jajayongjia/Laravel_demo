@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Dashboard</div>

                <div class="card-body">
                  <form method="POST" action="{{ route("admin.students.update",$student->id)}}">
                      {{method_field('PUT')}}
                        @csrf

                    Name:
                    <input type="text" name="name" value="{{$student->name}}" class="form-control"></input>

                    Phone Number:
                    <input type="text" name="phoneNumber" value="{{$student->phoneNumber}}"  class="form-control"></input>

                    Email:
                    <input type="text" name="email" value="{{$student->email}}"  class="form-control"></input>

                    <br />

                    <input type="submit" value="Save" class="btn btn-primary"></input>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
