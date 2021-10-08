@extends('layouts.dashboard') @section('content') @if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
<br /> @endif
<div class="row">
  <div class="col-md-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{route('topics.index')}}">Topics Management</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Topic</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Topic Details</h4>
      </div>
      <div class="card-body">
        <form method="post" action="{{action('TopicController@update', $topic->id)}}" data-parsley-validate class="form-horizontal form-label-left">
          {{csrf_field()}}
          <input name="_method" type="hidden" value="PATCH">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name
              <span class="required">*</span>
            </label>
            <div class="col-md-6">
              <input type="text" value="{{$topic->name}}" id="name" name="name" class="form-control"> @if ($errors->has('name'))
              <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category_id">Category
              <span class="required">*</span>
            </label>
            <div class="col-md-6">
              <select name="category_id" class="form-control">
                @if($topic->category_id != 0)
                <option selected value="{{$topic->category_id}}">{{$topic->category->name}}</option>
                @endif @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-6">
              Can't Find Right Category? Create one
              <a href="{{route('categories.index') }}">here...</a>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedTo">Assigned To
            </label>
            <div class="col-md-6">
              <div class="input-group">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Assign To</label>
                </div>
                <select class="custom-select" name="assignedTo" id="inputGroupSelect01">
                  @if($topic->assignedTo != 0)
                  <option selected disabled value="{{$topic->assignedTo}}">{{$topic->hasStudent->name}}</option>
                  @else
                  <option value="" selected>You can choose this later...</option>
                  @endif @foreach($applicants as $ap)
                  <option name="assignedTo" value="{{ $ap->user_id }}">{{ $ap->uname }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>

          <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
              <span class="required">*</span>
            </label>
            <div class="col-md-6">
              <textarea class="form-control" placeholder="Topic Description" rows="10" name="description" id="description">{{$topic->description}}</textarea>
            </div>
          </div>


          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <button type="submit" class="btn btn-success">Update Topic Details</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection