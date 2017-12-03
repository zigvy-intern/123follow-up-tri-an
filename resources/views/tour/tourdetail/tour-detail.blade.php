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
      @foreach($tour_image_detail as $key => $image)
       <div class="item {{$key == 0 ?  'active' : '' }} ">
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
  <div class="panel-group" id="accordion-des">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion-des" href="#collapse-info">Tour Info</a>
        </h4>
      </div>
      <div id="collapse-info" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="info">
            <div class="col-xs-12">
              <div class="row" style="font-size: 20px;margin-bottom: 20px; margin-top: 20px;">
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Tour ID: </b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->id}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Tour Name: </b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_name}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Departure:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_from_id}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Destination: </b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_to_id}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Start Time:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_start_time}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>End Time:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_end_time}}</div><br><br>
                <div class="col-md-4 col-sm-4 col-xs-5"><b>Number Members:</b></div>
                <div class="col-md-8 col-sm-8 col-xs-7">{{$getTour->tour_member}}</div><br><br>
              </div>
              <div class="row tour-info-right-frame">
                <div class="col-xs-12 hidden-xs">
                  <div class="f-left" style="margin-bottom: 10px;width:100%">
                    <div class="f-left olt1">
                      <div style="font-size:18px; margin-bottom:5px;color:#fc7700;border-bottom: 1px solid #ccc;padding-bottom: 5px;margin-top: 3px">
                        <span itemprop="price" style="font-size: 20px"><b>Price : ${{number_format($getTour->tour_price)}}</b></span>
                      </div>
                    </div>
                    <div class="f-left olt1">
                      <a href="{{route('tourLayout')}}" type="submit" value="Booking" class="btn btn-warning" style="font-size: 20px;">Available</a>
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
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion-des" href="#collapse-journey">Tour Journey</a>
        </h4>
      </div>
      <div id="collapse-journey" class="panel-collapse collapse">
        <div class="panel-body" style="font-size: 15px;">
          <button type="button" data-toggle="modal" data-target="#modalTourJourney" class="btn btn-default">
            <i class="glyphicon glyphicon-pencil"></i>
          </button><br><br>
          @include('tour.tourdetail.tour-journey-modal')
          {{$tourDetail->tour_description_detail}}
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
