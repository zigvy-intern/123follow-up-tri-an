@extends('master')
@section('content')
<script src="/js/hotelInfo.js"></script>
<div class="container" id="hotel-info-{{$hotelDetail->id}}" data-info-id="{{$hotelDetail->id}}">
  <div class="carousel slide" id="myCarousel" data-interval="3000" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators" style="left: 47%;">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div hidden> {{$hotelDetail->id}} </div>
    <div class="hotel-name" hidden data-hotel-name="{{$hotelDetail->id_hotel}}"> {{$hotelDetail->id_hotel}} </div>
    <div class="carousel-inner">
      @foreach($hotel_slide as $key => $slide)
       <div class="hotel-image item {{$key == 0 ?  'active' : '' }} ">
        <img src="/source/img/slideshow-hotel/{{$slide}}" width="100%">
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
          <a data-toggle="collapse" data-parent="#accordion-des" href="#collapse-description">Hotel Description</a>
        </h4>
      </div>
      <div id="collapse-description" class="panel-collapse collapse in">
        <div class="hotel-content panel-body" style="font-size: 15px;">
          <a class="btn btn-default" onclick="editHotelInfo(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></a>
          @include('hotel.hoteldetail.hotel-detail-modal')
          <br><br>
          <p class="hotel-description" data-description="{{$hotelDetail->hotel_description}}">{!! $hotelDetail->hotel_description !!}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
