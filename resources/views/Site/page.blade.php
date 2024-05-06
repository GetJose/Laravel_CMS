@extends('Site.layout')
@section('title', $page['title'])
@section('content')
<section id="hero" class="d-flex justify-cntent-center align-items-center">
  <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <!-- Slide 1 -->
    <div class="carousel-item active">
      <div class="carousel-container">
        <h2 class="animate__animated animate__fadeInDown">{{$page['title']}}</span></h2>
      </div>
    </div>

  </div>
</section><!-- End Hero -->
    <div class="container">
      {!!$page['body']!!}
    </div>
@endsection

