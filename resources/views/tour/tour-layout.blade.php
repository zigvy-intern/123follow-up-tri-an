@extends('master')
@section('content')
<script src="/source/js/ckeditor/ckeditor.js"></script>
<script src="js/addTour.js"></script>
<script src="js/bookTour.js"></script>
<script src="js/tourInfo.js"></script>
<div class="tour-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="tours">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tours" href="#collapse1">
            Hot Tours
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="form-group input-group">
            <input type="text" onkeyup="onTourSearch(this)" class="form-control" style="width: 200px; margin: 10px;">
            <button class="btn btn-default" type="button" style="margin: 10px -12px;"><i class="glyphicon glyphicon-search"></i></button>
          </div>
          <div class="container-fluid bg-3 text-center">
            <h1 style="font-size: 40px;margin-bottom: 10px;">Hot Tours
              <button class="btn btn-default" style="text-align:right;" data-toggle="modal" data-target="#modalAddTour" ><i class="glyphicon glyphicon-plus"></i></button>
              @include('tour.tour-modal')
            </h1>
            <hr style="width: 30%; margin-left:35%;">
            <div class="row" id="addTour-list">
              @foreach($join_city as $join)
              <div class="tour-item col-sm-4" id="addtour-{{$join->id}}" data-addtour-id="{{$join->id}}">
                <img class="tour-image" data-image="{{$join->tour_image}}" src="/source/img/tour/{{$join->tour_image}}" style="width:100%" alt="Image">
                <div class='tour-content' style="height: 150px;">
                  <h2 hidden>{{$join->id}}</h2>
                  <h2 class="tour-name" >{{$join->tour_name}}</h2>
                  <h2 class="tour-price" data-price="{{$join->tour_price}}" style="font-size: 20px;">Price: ${{number_format($join->tour_price)}}</h2>
                  <h2 class="tour-from" data-city-id="{{$join->tour_from_id}}" hidden>{{$join->city_name}}</h2>
                  <h2 class="tour-to" data-city-id="{{$join->tour_to_id}}" hidden>{{$join->city_name}}</h2>
                  <h2 class="tour-start" data-time="{{$join->tour_start_time}}" hidden>{{$join->tour_start_time}}</h2>
                  <h2 class="tour-end" hidden>{{$join->tour_end_time}}</h2>
                  <h2 class="tour-limit" hidden>{{$join->tour_limit_booking}}</h2>
                  <a href="{{route('tourDetail',$join->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
                  <a class="btn btn-default" onclick="editAddTour(this)" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a href="{{route('deleteTour',$join->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">{{$join_city->links()}}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tours" href="#collapse2">
            Booked Tour List
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          @include('tour.booktour.book-tour-list')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
