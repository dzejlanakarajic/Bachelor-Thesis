@extends('layouts.dashboard') @section('content')
<div class="row">
  <div class="col-md-2">
      <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Permissions</li>
          </ol>
        </nav>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Manage Permissions</h4>
        <p class="card-category">List of All Permissions</p>
      </div>
      <div class="card-body">
        <div class="table-responsive table-full-width">
          <table class="table table-hover">
            <thead>
              <th>ID</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Description</th>
              <th>Date Created</th>
              <th>Actions</th>
            </thead>
            <tbody>
              @foreach($permissions as $permission)
              <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->display_name}}</td>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td>{{$permission->created_at->toFormattedDateString()}}</td>
                <td class="td-actions text-right">
                  <a class="btn btn-info btn-simple btn-link" rel="tooltip" href="{{route('permissions.edit', $permission->id)}}" role="button" title="Edit Permission">
                      <i class="fa fa-edit"></i>
                  </a>
                  <a class="btn btn-info btn-simple btn-danger" rel="tooltip" href="{{route('permissions.show', $permission->id)}}" role="button" title="View Permission">
                      <i class="fa fa-eye"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
    </div>
   
  </div>
  <div class="col-md-4">
    <a href="{{route('permissions.create')}}" class="btn btn-primary"><i class="fa fa-user-plus"></i> Create New</a>
  </div>
</div>
@endsection