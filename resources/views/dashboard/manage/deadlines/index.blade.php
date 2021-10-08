@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Deadlines</li>
            </ol>
          </nav>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">All deadlines</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <th>Name</th>
                <th>Date</th>
                <th>Actions</th>
              </thead>
              <tbody>
                @foreach($deadlines as $deadline)
                <tr>
                  <td>{{$deadline->name}}</td>
                  <td>{{$deadline->date}}</td>
                  <td class="td-actions text-right">
                      <a class="btn btn-info btn-simple btn-link" rel="tooltip" href="{{route('deadlines.edit', $deadline->id)}}" role="button" title="Edit Deadline">
                          <i class="fa fa-edit"></i>
                      </a>
                      <form action="{{action('DeadlineController@destroy', $deadline['id'])}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="DELETE">
                      <button class="btn btn-info btn-simple btn-danger" rel="tooltip" role="button" title="Remove Deadline">
                          <i class="fa fa-times"></i>
                      </button> </form>
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
        <form method="post" action="{{route('deadlines.store')}}">
          {{csrf_field()}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label" for="name">Name
                    <span class="required">*</span>
                </label>
                <div>
                    <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control"> @if ($errors->has('name'))
                    <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="description">Date
                    <span class="required">*</span>
                </label>
              <div>
                  <div>
                      <input type="date" class="form-control" name="date">
                      </div>
              </div>
            </div>
            <div class="form-group">
                <div clas>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <button type="submit" class="btn btn-success">Add New</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection
