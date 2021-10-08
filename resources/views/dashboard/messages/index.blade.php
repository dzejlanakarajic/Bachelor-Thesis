@extends('layouts.message')

@section('content')
    @include('dashboard.messages.partials.flash')

    @each('dashboard.messages.partials.thread', $threads, 'thread', 'dashboard.messages.partials.no-threads')
@stop