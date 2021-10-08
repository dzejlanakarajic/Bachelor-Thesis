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
        <li class="breadcrumb-item active" aria-current="page">Role Details</li>
      </ol>
    </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{$role->display_name}}</h4>
        <h5 class="subtitle">
          <pre>{{$role->name}}</pre>
        </h5>
      </div>
      <div class="card-body">
        <h4 class="card-title">Permissions:</h4>
        <ul>
          @foreach($role->permissions as $r)
          <li>{{$r->display_name}}</li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <a href="{{route('roles.edit', $role->id)}}" class="btn btn-primary">
      <i class="fa fa-user"></i>Edit Role</a>
  </div>
</div>

@endsection