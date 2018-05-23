@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">My Posts</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (session('response'))
                        <div class="alert alert-success">
                            {{ session('response') }}
                        </div>
                    @endif
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Post ID</th>
                          <th>Title</th>
                          <th>Staus</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                        <tbody>
                          @foreach($getListing as $listings)
                           <tr>
                             <td>{{$listings->id}}</td>
                             <td>{{$listings->title}}</td>
                             <td>{{$listings->id}}</td>
                             <td>{{$listings->created_at->format('F d, Y')}}</td>
                             <td>{{$listings->updated_at->format('F d, Y')}}</td>
                             <td><a href="{{ route('edit', $listings->id) }}" target="_blank">Edit</a>/ <a href="{{ route('delete', $listings->id) }}" onclick="event.preventDefault();this.nextElementSibling.submit();">Delete</a>
                                <form id="deletePost-" action="{{ route('delete', $listings->id) }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                              </td>
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