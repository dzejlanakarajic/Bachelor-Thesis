@extends('layouts.dashboard') @section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> @endsection @section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('topics.index')}}">Topic Management</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create New Topic</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Topic Details</h4>
                <p class="card-category">All fields marked with * are required.</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('topics.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Title
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control"> @if ($errors->has('name'))
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
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            Can't Find Right Category? Create one
                            <a href="{{route('categories.index') }}">here...</a>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('assignedTo') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedTo">Assign To
                        </label>
                        <div class="col-md-6">
                            <select class="myselect" style="width:500px;" name="assignedTo" id="inputGroupSelect01">
                                <option value="" selected>You can choose this later...</option>
                                @foreach($users as $user)
                                <option name="assignedTo" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('assignedTo'))
                            <span class="help-block">The student already has a topic</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea class="form-control" placeholder="Topic Description" rows="10" name="description" id="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success">Create Topic</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(".myselect").select2();
</script>
@endsection