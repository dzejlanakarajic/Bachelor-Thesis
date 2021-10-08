@extends('layouts.welcome') @section('content')
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Post Content Column -->
    <div class="col-lg-8">

      <!-- Title -->
      <h1 class="mt-4">{{$topic->name}}</h1>

      <!-- Author -->
      <p class="lead">
        by
        <a href="#">{{$topic->hasAuthor->name}}</a>
      </p>

      <hr>

      <!-- Date/Time -->
      <p>Posted on {{$topic->created_at->toFormattedDateString()}} in
        <a href="#">{{$topic->category->name}}</a>
      </p>

      <hr>


      <!-- Post Content -->
      <p class="lead">{{$topic->description}}</p>
      <hr>
      <br>
      <!-- Apply Button -->
      @guest
      <p>You have to log in to apply for this topic, login <strong><a href="{{route('login')}}">Here</a></strong></p>
      @endguest

      @role('student')
      @if ($hasTopic->count() !=0) 
      <p>You already have thesis topic.</p>
      @elseif(!empty($topic->assignedTo))
      <p>This topic has already been taken!</p>
      @elseif($applied->count() === 0)
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyModal">
        Apply for this topic
    </button>
      @else
      <p><strong>You already applied for this topic!</strong></p>
      @endif
      @endrole
    
      <!-- Modal -->
      <div id="applyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
          <div role="document" class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Apply For Topic</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('applyThesis.store')}}">
                    {{csrf_field()}}
                    <p>You're applying for, <strong>{{$topic->name}}</strong></p>
                  <div class="form-group">
                    <button type="submit" class="submit btn btn-primary" value="{{ $topic->id }}" name="topic_id">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>


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