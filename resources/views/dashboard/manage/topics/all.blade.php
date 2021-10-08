@extends('layouts.welcome') @section('styles')
<style>
  body {
    padding-top: 54px;
  }

  @media (min-width: 992px) {
    body {
      padding-top: 56px;
    }
  }
</style>
@endsection @section('content')
<!-- Page Content -->
<div class="container">
  <div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-8">
      <br>
      <br>
      <!-- Blog Post -->
      @if(! $topics->count())
      <p class="alert alert-warning">
        Opps...Nothing found here
      </p>
      @else
      @foreach($topics as $topic)
      <div class="card mb-4">
        <div class="card-body">
          <h2 class="card-title">{{$topic->name}} </h2>
          <p class="card-text">{{$topic->description}}</p>
          <a href="{{route('topic.single', $topic->id)}}" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on {{$topic->created_at->toFormattedDateString()}} by
          <a href="#">{{$topic->hasAuthor->name}}
            @if(empty($topic->assignedTo))
            <span class="badge badge-pill badge-success">Available</span>
            @else
            <span class="badge badge-pill badge-danger">Taken</span>
            @endif
          </a>
        </div>
      </div>
      @endforeach
      @endif
      {{$topics->links()}}
    </div>
    <!-- Sidebar Widgets Column -->
    <div class="col-md-3">
      <br>
      <!-- Categories Widget -->
      <div class="card my-4">
        <h5 class="card-header">Categories</h5>
        <ul class="list-group">
          @foreach($categories as $category)
          <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="{{route('category', $category->id)}}">{{$category->name}}</a>
            <span class="badge badge-pill badge-warning">{{$category->topics->count()}}</span>
          </li>
          @endforeach
        </ul>
 
      </div>
    </div>
  </div>
  <!-- /.row -->
</div>
@endsection
