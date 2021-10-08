@extends('layouts.dashboard') @section('content')
<div class="row">
  <div class="col-md-2">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Topic Management</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage Topics</h4>
        <p class="card-category">List of All Topics</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table-full-width">
          <table class="table table-hover">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Assigned To</th>
              <th>Date Created</th>
              <th>Status</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach($topics as $topic)
              <tr>
                <td>{{$topic->id}}</td>
                <td>{{$topic->name}}</td>
                <td>{{$topic->category->name}}</td>
                <td>
                  @if (empty($topic->hasStudent->name))
                  none
                  @else {{$topic->hasStudent->name}}
                  @endif
                </td>
                <td>{{$topic->created_at->toFormattedDateString()}}</td>
                <td>
                  @if($topic->assignedTo != 0)
                  <span class="badge badge-pill badge-danger">Topic Taken</span>
                  @else
                  <span class="badge badge-pill badge-success">Available</span>
                  @endif
                </td>
                <td class="td-actions text-right">
                  <a class="btn btn-simple btn-default" rel="tooltip" href="{{route('topics.show', $topic->id)}}" role="button" title="View Topic">
                    <i class="fa fa-eye"></i>
                  </a>
                  <a class="btn btn-info btn-simple btn-link" rel="tooltip" href="{{route('topics.edit', $topic->id)}}" role="button" title="Edit Topic">
                    <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{action('TopicController@destroy', $topic['id'])}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-info btn-simple btn-danger" rel="tooltip" role="button" title="Remove Topic">
                      <i class="fa fa-times"></i>
                    </button>
                  </form>
                  @if($topic->assignedTo != 0)
                  <form method="post" action="{{action('TopicController@update', $topic->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="PATCH">


                    <input type="hidden" value="{{$topic->name}}" id="name" name="name">
                    <input type="hidden" value="{{$topic->category_id}}" id="category_id" name="category_id">
                    <input type="hidden" value="{{$topic->description}}" id="description" name="description">
                    <input type="hidden" value="" id="assignedTo" name="assignedTo">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button class="btn btn-info btn-simple btn-warning" rel="tooltip" role="button" title="Reassign Topic">
                      <i class="fa fa-refresh"></i>
                    </button>

                </form>
                @endif
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>

    </div>
  </div>
  <div class="col-md-4">
    <a href="{{route('topics.create')}}" class="btn btn-primary">
      <i class="fa fa-user-plus"></i> Create New</a>
  </div>
</div>
@endsection