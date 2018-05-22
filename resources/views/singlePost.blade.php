@extends('layouts.app')

@section('content')
<!-- Page Content -->
    <div class="container center-layout">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <h1 class="my-4">
            <small>SIngle Post Page</small>
          </h1>
        
          <!-- Blog Post -->
          @foreach($getPost as $post)
          <div class="card mb-4">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}}</h2>
              <p class="card-text">{{$post->description}}</p>
            </div>
            <div class="card-footer text-muted">
              Posted on {{$post->created_at->format('F d, Y')}} by
              <a href="/posts/author/{{$post->username}}" target="_blank">{{$post->name}}</a>
            </div>
          </div>
          @endforeach

        </div>

       
      <!-- /.row -->

    </div>
    <!-- /.container -->
</div>
<style type="text/css">
    .center-layout {
    width: 60% !important;
    margin: 0 auto;
}
</style>
@endsection
