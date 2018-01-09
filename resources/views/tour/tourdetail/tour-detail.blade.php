@extends('master')
@section('content')
<script src="/js/tourInfo.js"></script>
<div class="container" id="tour-info-{{$tourDetail->id}}" data-info-id="{{$tourDetail->id}}">
  <div class="carousel slide" id="myCarousel" data-interval="3000" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators" style="left: 47%;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div hidden> {{$tourDetail->id}} </div>
    <div class="info-tour" hidden data-tour-name="{{$tourDetail->tour_id}}"> {{$tourDetail->tour_id}} </div>
    <div class="carousel-inner">
      @foreach($tour_image_detail as $key => $image)
       <div class="info-image item {{$key == 0 ?  'active' : '' }} ">
        <img src="/source/img/slideshow-tour/{{$image}}" width="100%">
      </div>
      @endforeach
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  <div class="panel-group" id="accordion-des">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion-des" href="#collapse-journey">Tour Journey</a>
        </h4>
      </div>
      <div id="collapse-journey" class="panel-collapse collapse in">
        <div class="info-content panel-body" style="font-size: 15px;">
          <a class="btn btn-default" onclick="editTourInfo(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></a>
          @include('tour.tourdetail.tour-detail-modal')
          <br><br>
          <p class="info-journey" data-journey="{{$tourDetail->tour_description_detail}}">{!! $tourDetail->tour_description_detail !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
