
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Dashboard</div>

                <div class="card-body">
                  <a href="{{ route('admin.students.create')}}" class="btn btn-sm btn-primary">Add new</a>

                  <br /><br />

                  <div class="row">
                  <div class="col-sm-7"></div>
                  <div class="col-sm-5 form-group">
                    <form href="{{route('admin.students.index')}}" method="GET" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                      </div>
                  </div>

                    <table class='table '>
                    <tr>
                      <th>Name <a href="{{route('admin.students.index')}}?search={{request('search')}}&field=name&sort={{request('sort','asc')=='asc'?'desc':'asc'}}"> <i class="fa fa-fw fa-sort"> </i></a></th>
                      <th>PhoneNumber <a href="{{route('admin.students.index')}}?search={{request('search')}}&field=phoneNumber&sort={{request('sort','asc')=='asc'?'desc':'asc'}}"> <i class="fa fa-fw fa-sort"> </i></a></th>
                      <th>Email <a href="{{route('admin.students.index')}}?search={{request('search')}}&field=email&sort={{request('sort','asc')=='asc'?'desc':'asc'}}"> <i class="fa fa-fw fa-sort"> </i></a></th>
                      <th></th>
                    </tr>

                  @forelse($students as $student)
                    <tr>
                      <td>{{$student->name}}</td>
                       <td>{{$student->phoneNumber}}</td>
                      <td>{{$student->email}}</td>
                      <td> <a href="{{ route('admin.students.edit',$student->id)}}" class="btn btn-sm btn-primary">Edit</a>


                        <form method="POST" action="{{ route("admin.students.destroy",$student->id)}}">
                            {{method_field('DELETE')}}
                              @csrf
                              <input type="submit" value="Delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"></input>
                            </form>
                    </td>
                    </tr>
                  @empty
                      <tr>
                        <td colspan="2"> No Record </td>
                      </tr>
                  @endforelse
                  </table>
                  {{$students->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
