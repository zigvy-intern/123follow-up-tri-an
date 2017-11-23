@extends('master')
@section('content')
<div class="container">
  <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
      @foreach($tour_image_detail as $image)
       <div class="item @if($image == 0) {{ 'active' }} @endif">
        <img src="/source/img/slideshow-tour/{{$image}}" width="100%">
        <div class="carousel-caption">
          <h3>First slide label</h3>
          <p>Lorem ipsum dolor sit amet...</p>
        </div>
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
  <div class="description">
    <h1 style="font-size: 30px;color: #20206C;"><b>{{$tourDetail->tour_name_detail}}</b></h1>
  </div>
  <div class="panel-group" id="accordion-des">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin: -5px;">
          <a style="margin-right: 1040px;" data-toggle="collapse" data-parent="#accordion-des" href="#collapse1">Tour Info</a>
          <button type="button" data-toggle="modal" data-target="#modalTourInfo" class="btn btn-default">
            <i class="glyphicon glyphicon-pencil"></i>
          </button>
          @include('tour.tourdetail.tour-info-modal')
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="info">
            <div class="col-xs-12">
              <div class="row" style="font-size: 15px;margin-bottom: 20px; margin-top: 20px;">
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Tour ID: </b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->id}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Departure:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_from}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Destination: </b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_to}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Departure Time:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_time}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Number Members:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_member}}</div><br><br>
              </div>
              <div class="row tour-info-right-frame">
                <div class="col-xs-12 hidden-xs">
                  <div class="f-left" style="margin-bottom: 10px;width:100%">
                    <div class="f-left olt1">
                      <div style="font-size:18px; margin-bottom:5px;color:#fc7700;border-bottom: 1px solid #ccc;padding-bottom: 5px;margin-top: 3px">
                        <span itemprop="price"><b>Price :</b> ${{number_format($getTour->tour_price)}}</span>
                      </div>
                    </div>
                    <div class="f-left olt1">
                      <a href="#" type="submit" value="Booking" class="btn btn-warning" style="font-size: 20px;">Available</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title" style="margin: -5px;">
          <a style="margin-right: 1010px;" data-toggle="collapse" data-parent="#accordion-des" href="#collapse2">Tour Journey</a>
          <button type="button" data-toggle="modal" data-target="#modalTourJourney" class="btn btn-default">
            <i class="glyphicon glyphicon-pencil"></i>
          </button>
          @include('tour.tourdetail.tour-journey-modal')
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body" style="font-size: 15px;">
          {{$tourDetail->tour_description_detail}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
