@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('permissions.index')}}">Permissions</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create New Permission</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
          <h4 class="card-title">Permission Details</h4>
          <p class="card-category">All fields marked with * are required.</p>
      </div>
      <div class="card-body">
          <form method="post" action="{{route('permissions.store')}}">
            {{csrf_field()}}
            <div class="row">
              <div class="form-group col-md-4">
                <label for="display_name">Name (Display Name)</label>
                <input type="text" class="form-control" name="display_name">
              </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                  <label for="name">Slug</label>
                  <input type="text" class="form-control" name="name">
                </div>
              </div>
            <div class="row">
                <div class="form-group col-md-4">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" placeholder="Describe what this permission does">
                </div>
              </div>
              <div class="row">
                  <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-success">Add Permission</button>
                  </div>
                </div>
              </form>
            </div>
            </div>
</div>
</div>
@endsection
