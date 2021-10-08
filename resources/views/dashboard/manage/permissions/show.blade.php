@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('permissions.index')}}">Permissions</a></li>
              <li class="breadcrumb-item active" aria-current="page">Permission Details</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Permission Details</h4>
      </div>
      <div class="card-body">
        <div>
            <label for="display_name" class="label">Name (Display Name)</label>
            <pre>{{$permission->display_name}}</pre>
        </div>
        <div>
            <label for="name" class="label">Slug</label>
            <pre>{{$permission->name}}</pre>
        </div>
        <div>
            <label for="description" class="label">Description</label>
            <pre>{{$permission->description}}</pre>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-primary"><i class="fa fa-user"></i>Edit Permission</a>
  </div>
</div>
@endsection