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
          <a href="{{route('roles.index')}}">Roles</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Create New Role</li>
      </ol>
    </nav>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Role Details</h4>
        <p class="card-category">All fields marked with * are required.</p>
      </div>
      <div class="card-body">
        <form method="post" action="{{route('roles.store')}}">
          {{csrf_field()}}
          <div class="row">
            <div class="form-group col-md-4">
              <label for="display_name">Name (Display Name)</label>
              <input type="text" class="form-control" name="display_name" value="{{old('display_name')}}" id="display_name">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="name">Slug (Can not be changed)</label>
              <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name">
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <label for="description">Description</label>
              <input type="text" class="form-control" placeholder="Role Description ex. Administrator" value="{{old('description')}}" id="description"
                name="description">
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <label for="permission">Permissions</label>
              <select class="form-control select2-multi" name="permissions[]" multiple="multiple">
                @foreach($permissions as $permission)
                <option value='{{ $permission->id }}'>{{ $permission->display_name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-4">
              <button type="submit" class="btn btn-success">Add Role</button>
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