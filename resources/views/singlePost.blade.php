@extends('layouts.app')

@section('content')

    <div class="container" style="width: 80%;">
      <div class="row">
        <div class="col-lg-12">
            <h1 class="mt-4">{{$postData['getPost']->title}}</h1>
            <p class="lead">
              by
              <img class="d-flex rounded-circle" src="{{$postData['getPost']->profilePic}}" style="width: 35px; display: inline-flex !important; vertical-align: middle;" alt="">
              <a href="{{route('author', $postData['getPost']->username)}}">{{$postData['getPost']->name}}</a>
            </p>
          <hr>
          <p>Posted on {{$postData['getPost']->created_at->format('F d, Y')}}</p>
          <hr>
          <p class="lead">{{$postData['getPost']->description}}</p>
          <hr>
          @if (session('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
          @endif
          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form method="post" action="{{route('addComment', $postData['getPost']->id)}}">
                  @csrf
                  <div class="form-group row">
                    <div class="col-md-12">
                        <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" value="{{ old('message') }}" required ></textarea>

                        @if ($errors->has('message'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-md-12">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Add Comment') }}
                          </button>
                      </div>
                  </div>
              </form>
            </div>
          </div>

            <!-- Single Comment -->
          @if(count($postData['commentData']))
            @foreach($postData['commentData'] as $commentData)

            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" style="width: 35px; display: inline-flex !important; vertical-align: middle;" src="{{$commentData->profilePic}}" alt="">
              <div class="media-body">
                <h5 class="mt-0">{{$commentData->name}}</h5>
                {{$commentData->message}}
              </div>
            </div>
            @endforeach
          @endif
        </div>
      </div>
    </div>
@endsection
