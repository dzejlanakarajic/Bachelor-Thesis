@extends('layouts.dashboard') @section('content') @if(Laratrust::hasRole('student'))
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Graduation Thesis Details</h4>
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <ul role="tablist" class="nav nav-tabs">
                    <li role="presentation" class="nav-item show active">
                        <a class="nav-link" id="info-tab" href="#agency" data-toggle="tab">Title</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-tab" href="#company" data-toggle="tab">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="style-tab" href="#style" data-toggle="tab">Mentor</a>
                    </li>
                </ul>
                <div class="tab-content">
                    @forelse($topics as $tp)
                    <div id="agency" class="tab-pane fade show active" role="tabpanel" aria-labelledby="info-tab">
                        <br>
                        <br> {{$tp->name}}
                    </div>
                    <div id="company" class="tab-pane fade" role="tabpanel" aria-labelledby="account-tab">
                        <br> {{$tp->description}}
                    </div>
                    <div id="style" class="tab-pane fade" role="tabpanel" aria-labelledby="style-tab">
                        <br> {{$tp->hasAuthor->name}}
                    </div>
                    @empty
                    <div id="agency" class="tab-pane fade show active" role="tabpanel" aria-labelledby="info-tab">
                        <br>
                        <br> Ops, you don't have a thesis topic yet...
                    </div>
                    <div id="company" class="tab-pane fade" role="tabpanel" aria-labelledby="account-tab">
                        <br> Choose your topic...
                    </div>
                    <div id="style" class="tab-pane fade" role="tabpanel" aria-labelledby="style-tab">
                        <br> No mentor
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Your Tasks</h4>
                <p class="card-category">Assigned by Your Mentor</p>
            </div>
            <div class="card-body ">
                <div class="table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>To Do</th>
                            <th>Mentor</th>
                            <th>When</th>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->name}}</td>
                                <td>{{$task->description}}</td>
                                <td>{{$task->professor->name}}</td>
                                <td>{{$task->date->toFormattedDateString()}}</td>
                                <td>
                                    @if($task->date->isToday())
                                    <span class="badge badge-success">Today</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@elseif(Laratrust::hasRole('administrator'))
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recently Registered Users</h4>
                <p class="card-category">If student of IBU assign role Student if not delete</p>
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
                            @foreach($users as $user) @if($user->roles->count() == 0)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->toFormattedDateString()}}</td>
                                <td class="td-actions text-right">
                                    <a class="btn btn-info btn-simple btn-link" rel="tooltip" href="{{route('users.edit', $user->id)}}" role="button" title="Edit User">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a class="btn btn-info btn-simple btn-warning" rel="tooltip" href="{{route('users.show', $user->id)}}" role="button" title="Show User">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <form action="{{action('UserController@destroy', $user['id'])}}" method="post">
                                        {{csrf_field()}}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-info btn-simple btn-danger" rel="tooltip" role="button" title="Remove User">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <a href="{{route('users.create')}}" class="btn btn-primary">
            <i class="fa fa-user-plus"></i> Create New</a>
    </div>
</div>

@elseif(Laratrust::hasRole('coordinator'))
<div class="row">
    <div class="col-md-6">
        <div class="card  card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Deadlines</h4>
            </div>
            <div class="card-body ">
                <div class="table-full-width">
                    <table class="table">
                        <tbody>
                            @foreach($deadlines as $dd)
                            <tr>

                                <td>{{$dd->name}}</td>
                                <td>

                                    {{$dd->date}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@elseif(Laratrust::hasRole('professor'))
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Manage Topics</h4>
                <p class="card-category">List of All Topics</p>
            </div>
            <div class="card-body">
                <div class="table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Student</th>
                        </thead>
                        <tbody>
                            @foreach($assignedtopics as $at)
                            <tr>
                                <td>{{$at->name}}</td>
                                <td>{{$at->hasStudent->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-tasks">
            <div class="card-header ">
                <h4 class="card-title">Your Tasks</h4>
                <p class="card-category">List of all tasks</p>
            </div>
            <div class="card-body ">
                <div class="table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>To Do</th>
                            <th>Student</th>
                            <th>When</th>
                        </thead>
                        <tbody>
                            @foreach($ptasks as $ptask)
                            <tr>
                                <td>{{$ptask->name}}</td>
                                <td>{{$ptask->description}}</td>
                                <td>{{$ptask->student->name}}</td>
                                <td>{{$ptask->date->toFormattedDateString()}}</td>
                                <td>
                                    @if($ptask->date->isToday())
                                    <span class="badge badge-success">Today</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@else
<div class="container">
    <div class="col-md-12">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Hello, {{Auth::user()->name}}</h4>
            <p>Your registration to IBU SDP was successful, but we need to confirm your account first. Please give us time to check your info!!!blablabla</p>
            <hr>
            <p class="mb-0">If you still didn't get access please click the button below to notify our admins by email. <br>
            Thanks!!!
            </p>
        </div>
        <div>
            <a href="{{route('sendEmail')}}" class="btn btn-primary" onclick="this.disabled=true;this.form.submit();">Request Access</a>
        </div>
    </div>
</div>

@endif @endsection