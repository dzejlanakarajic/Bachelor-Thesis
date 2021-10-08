@extends('layouts.dashboard') @section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> @endsection @section('content') @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
<br /> @endif @if (\Session::has('success'))
<div class="alert alert-success">
    <p>{{ \Session::get('success') }}</p>
</div>
<br /> @endif
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Assign Task</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Task Details</h4>
                <p class="card-category">All fields marked with * are required.</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('tasks.store') }}" data-parsley-validate class="form-horizontal form-label-left">
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
                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Description
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" value="{{ Request::old('description') ?: '' }}" id="description" name="description" class="form-control"> @if ($errors->has('description'))
                            <span class="help-block">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('assignedTo') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="assignedTo">Assign To
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <select class="myselect form-control" style="width:500px;" name="assignedTo" id="inputGroupSelect01">

                                <option value="" selected>choose student...</option>
                                @foreach($topics as $user) @if($user->assignedTo == 0)
                                
                                @else
                                <option name="assignedTo" value="{{$user->assignedTo}}">{{$user->hasStudent->name}}</option>
                                @endif @endforeach

                            </select>
                            @if ($errors->has('assignTo'))
                            <span class="help-block">{{ $errors->first('assignTo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Date
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success">Assign Task</button>
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