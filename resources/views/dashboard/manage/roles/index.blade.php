@extends('layouts.dashboard') @section('content')
<div class="row">
  <div class="col-md-2">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Roles</li>
          </ol>
        </nav>
  </div>
  <div class="col-md-4">
      <a href="{{route('roles.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New Role</a>
    </div>
</div>
<div class="row">
    @foreach($roles as $role)
  <div class="col-md-2">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$role->display_name}}</h4>
        <h5 class="subtitle"><em>{{$role->name}}</em></h5>
        <p class="card-category">{{$role->description}}</p>
      </div>
      <div class="card-body">
          <a href="{{route('roles.show', $role->id)}}" class="btn btn-info">Details</a>
          <a href="{{route('roles.edit', $role->id)}}" class="btn btn-light">Edit</a>
      </div>
    </div>
    
  </div>
  @endforeach
  
</div>
@endsection