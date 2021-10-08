@extends('layouts.dashboard') @section('content')
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
                <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Role Details</h4>
      </div>
      <div class="card-body">
          <form method="post" action="{{route('roles.update', $role->id)}}">
              {{csrf_field()}}
              {{method_field('PUT')}}
            <div class="row">
              <div class="form-group col-md-4">
                <label for="display_name">Name (Display Name)</label>
                <input type="text" class="form-control" name="display_name" value="{{$role->display_name}}" id="display_name">
              </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Slug (Can not be changed)</label>
                  <input type="text" class="form-control" name="name" value="{{$role->name}}" id="name" disabled>
                </div>
              </div>
            <div class="row">
                <div class="form-group col-md-4">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" placeholder="Describe what this permission does" value="{{$role->description}}" id="description" name="description">
                </div>
              </div>
            
              <div class="card-body">
                    <h4 class="card-title">Permissions:</h4>
                    <ul>
                      @foreach($role->permissions as $r)
                      <li>{{$r->display_name}}</li>
                      @endforeach
                    </ul>
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
@endsection