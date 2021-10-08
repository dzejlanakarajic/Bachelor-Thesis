@extends('layouts.message')

@section('content')
    <div class="col-md-10">
        <h1>Subject: <em>{{ $thread->subject }}</em></h1>
        @each('dashboard.messages.partials.messages', $thread->messages, 'message')

        @include('dashboard.messages.partials.form-message')
    </div>
@stop