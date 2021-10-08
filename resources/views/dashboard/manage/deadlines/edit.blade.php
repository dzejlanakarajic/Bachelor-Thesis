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
        <form method="post" action="{{route('deadlines.update', $deadline->id)}}">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="control-label" for="name">Name
                    <span class="required">*</span>
                </label>
                <div>
                    <input type="text" value="{{$deadline->name}}" id="name" name="name" class="form-control"> @if ($errors->has('name'))
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
                      <input type="date" class="form-control" name="date" value="{{$deadline->date}}">
                      </div>
              </div>
            </div>
            <div class="form-group">
                <div clas>
                    <button type="submit" class="btn btn-success">Add New</button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection
