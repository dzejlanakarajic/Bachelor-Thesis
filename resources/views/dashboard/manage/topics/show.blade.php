@extends('layouts.dashboard') @section('content')
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('topics.index')}}">Topic Management</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Topic Details</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Topic Details</h4>
            </div>
            <div class="card-body">
                <div>
                    <label for="name" class="label">Title</label>
                    <pre>{{$topic->name}}</pre>
                </div>
                <div>
                    <label for="name" class="label">Assigned To</label>
                    <pre>@if(empty($topic->assignedTo))None @else{{$topic->hasStudent->name}}
                        @endif
                    </pre>
                </div>
                <div>
                    <label for="description" class="label">Description</label>

                    <p>
                        {{$topic->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <a href="{{route('topics.edit', $topic->id)}}" class="btn btn-primary">
            <i class="fa fa-user"></i>Edit Topic</a>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Applicants</h4>
            </div>
            <div class="card-body">
                <div>
                    <label for="name" class="label">Student Name</label>
                    <ul class="list-group">
                        @foreach($applicants as $ap)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a>{{$ap->uname}}</a>
                            <form method="post" action="{{action('TopicController@update', $topic->id)}}" data-parsley-validate class="form-horizontal form-label-left">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="PATCH">


                                <input type="hidden" value="{{$topic->name}}" id="name" name="name">
                                <input type="hidden" value="{{$topic->category_id}}" id="category_id" name="category_id">
                                <input type="hidden" value="{{$topic->description}}" id="description" name="description">
                                <input type="hidden" value="{{$ap->user_id}}" id="assignedTo" name="assignedTo">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="badge bade-pill badge-warning">Assign To</button>

                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection