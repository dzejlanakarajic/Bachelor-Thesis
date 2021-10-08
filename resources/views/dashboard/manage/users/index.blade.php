@extends('layouts.dashboard') @section('content')
<div class="row">
  <div class="col-md-2">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Management</li>
          </ol>
        </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage Users</h4>
        <p class="card-category">List of All Users</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table-full-width">
          <table class="table table-hover">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date Created</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->toFormattedDateString()}}</td>
                <td class="td-actions text-right">
                  <a class="btn btn-info btn-simple btn-link" rel="tooltip" href="{{route('users.edit', $user->id)}}" role="button" title="Edit User">
                      <i class="fa fa-edit"></i>
                  </a>
                  <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-info btn-simple btn-danger" rel="tooltip" role="button" title="Remove User">
                      <i class="fa fa-times"></i>
                  </button> </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
      <div class="card-footer">
      </div>
    </div>
    {{$users->links()}}
  </div>
  <div class="col-md-4">
    <a href="{{route('users.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New</a>
  </div>
</div>
@endsection