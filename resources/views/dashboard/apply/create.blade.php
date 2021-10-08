@extends('layouts.dashboard')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @endif
<div class="row">
    <div class="col-md-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Apply For Topic</li>
            </ol>
        </nav>
    </div>
</div>
@forelse($utopics as $tp)
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    You already have a topic, {{$tp->name}}
                </h4>
                <p>Your mentor is <strong>{{$tp->hasAuthor->name}}</strong></p>
            </div>
        </div>
    </div>
</div>
@empty
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Choose Topic</h4>
                
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('applyThesis.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                        <div>
                            <select name="topic_id" class="form-control{{ $errors->has('topic_id') ? ' has-error' : '' }}">
                                @foreach($topics as $topic)
                                  <option value="{{$topic->id}}">{{$topic->name}}</option>
                                @endforeach
                              </select>
                              @if ($errors->has('topic_id'))
                            <span class="help-block">You can't apply for the same topic twice!</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <button type="submit" class="btn btn-success">Apply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Topics you applied for</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive table-full-width">
                  <table class="table table-hover">
                    <thead>
                      <th>Name</th>
                      <th>Date Applied</th>
                      <th>Actions</th>
                    </thead>
                    <tbody>
                     @foreach($applications as $ap)
                      <tr>
                        <td>{{$ap->hasTopic->name}}</td>
                        <td>{{$ap->created_at->toFormattedDateString()}}</td>
                        <td class="td-actions text-right">
                          <form action="{{action('ApplyController@destroy', $ap->id)}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-info btn-simple btn-danger" rel="tooltip" role="button" title="Delete Application">
                              <i class="fa fa-times"></i>
                            </button>
                          </form>
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
@endforelse
@endsection