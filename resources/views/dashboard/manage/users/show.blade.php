@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('users.index')}}">User Management</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Details</li>
            </ol>
          </nav>
    </div>
</div>
<div class="row">
  <div class="col-md-5">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">User Details</h4>
      </div>
      <div class="card-body">
        <div>
            <label for="name" class="label">Name</label>
            <pre>{{$user->name}}</pre>
        </div>
        <div>
            <label for="email" class="label">Email</label>
            <pre>{{$user->email}}</pre>
        </div>
        <div>
          <label for="roles" class="label">Roles</label>
          <ul>
            {{$user->roles->count() == 0 ? 'This user has not been assigned any roles yet' : ''}}
            @foreach ( $user->roles as $role)
            <li>
              {{$role->display_name}}
            </li>
            @endforeach
          </ul>
      </div>
      </div>
    </div>
  </div>
  <div class="col-md-2">
    <a href="{{route('users.edit', $user->id)}}" class="btn btn-primary"><i class="fa fa-user"></i>Edit User</a>
  </div>
</div>
@endsection