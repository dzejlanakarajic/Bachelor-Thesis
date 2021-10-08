@extends('layouts.dashboard') @section('content')
<div class="row">
  <div class="col-md-2">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Feedbacks</li>
          </ol>
        </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Received Feedbacks</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive table-full-width">
          <table class="table table-hover">
            <thead>
              <th>ID</th>
              <th>From</th>
              <th>Message</th>
            </thead>
            <tbody>
              @foreach($feedbacks as $feedback)
              <tr>
                <td>{{$feedback->id}}</td>
                <td>{{$feedback->name}}</td>
                <td>{{$feedback->body}}</td>
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