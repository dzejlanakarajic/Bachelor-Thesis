@extends('layouts.dashboard') @section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> @endsection @section('content')
<div class="row">
  <div class="col-md-3">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{route('home')}}">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{route('users.index')}}">User Management</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">User Details</h4>
        <p class="card-category">All fields marked with * are required.</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{action('UserController@update', $user->id)}}" data-parsley-validate class="form-horizontal form-label-left">
          {{csrf_field()}}
          <input name="_method" type="hidden" value="PATCH">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" value="{{$user->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12"> @if ($errors->has('name'))
              <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email
              <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" value="{{$user->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12"> @if ($errors->has('email'))
              <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>
          <!-- le keep user old password -->

          <input type="hidden" name="password" value="{{$user->password}}">
          <div class="form-group">
            <label for="roles" class="control-label col-md-3 col-sm-3 col-xs-12">Roles

            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">

              {{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : ''}}
              <select class="form-control select2-multi col-md-7 col-xs-12" name="roles[]" multiple="multiple">
                @if(!empty($user->roles)) @foreach($user->roles as $role)
                <option selected value="{{ $role->id }}">{{ $role->display_name }}</option>
                @endforeach @endif @foreach($roles as $role)
                <option value='{{ $role->id }}'>{{ $role->display_name }}</option>
                @endforeach
              </select>

            </div>
          </div>


          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <input type="hidden" name="_token" value="{{ Session::token() }}">
              <button type="submit" class="btn btn-success">Update User Details</button>
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
  $('.select2-multi').select2();
</script>
@endsection