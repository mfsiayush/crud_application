@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tbody>
                           <tr>
                            <th>Profile Picture</th>
                            <td><img src="{{$userDetails->profilePic}}"/></td>
                          </tr>
                            <tr>
                            <th>ID</th>
                            <td>{{$userDetails->id}}</td>
                          </tr>
                          <tr>
                          <tr>
                            <th>Name</th>
                            <td>{{$userDetails->name}}</td>
                          </tr>
                          <tr>
                            <th>Email</th>
                            <td>{{$userDetails->email}}</td>
                          </tr>
                          <tr>
                            <th>Username</th>
                            <td>{{$userDetails->username}}</td>
                          </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection