@extends('layouts.welcome') 

 @section('content')
 @include('homepage.nav.header')

<section id="about-us" class="about-us bg-white">
  <div class="container">
    <h2>Deadlines</h2>
    <div class="row">
      <p class="lead col-lg-10">
        @foreach($deadlines as $dd) {{$dd->name}} {{$dd->date}} <br> @endforeach
      </p>
    </div>
    <a href="#" class="btn btn-primary btn-shadow btn-gradient">Discover More</a>
  </div>
</section>


<section id="testimonials" class="testimonials bg-gray">
  <div class="container">
    <header class="text-center no-margin-bottom">
      <h2>Recent Topics</h2>
      <p class="lead">Latest Published Topics, follow the link and Apply</p>
    </header>
    <div class="owl-carousel owl-theme testimonials-slider">
      @foreach($topics as $topic)
      <div class="item-holder">
        <div class="item">
          <div class="text">
            <strong class="name">{{$topic->name}}</strong>
            <p>{{$topic->hasAuthor->name}}</p>
            <a href="{{route('topic.single', $topic->id)}}">Read More...</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    <br>
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <a href="{{route('topics')}}" class="btn btn-primary btn-shadow btn-gradient">View All</a>
        </div>
      </div>
    </div>
  </div>
</section>
<div id="scrollTop">
  <div class="d-flex align-items-center justify-content-end">
    <i class="fa fa-long-arrow-up"></i>To Top</div>
</div>
@endsection