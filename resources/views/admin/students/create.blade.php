@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Dashboard</div>

                <div class="card-body">
                  <form method="POST" action="{{ route("admin.students.store")}}">
@csrf

                    Name:
                    <input type="text" name="name" class="form-control"></input>

                    Phone Number:
                    <input type="text" name="phoneNumber" class="form-control"></input>

                    Email:
                    <input type="text" name="email" class="form-control"></input>

                    <br />

                    <input type="submit" value="Save" class="btn btn-primary"></input>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
