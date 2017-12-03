@extends('master')
@section('content')
<script src="js/addTour.js"></script>
<script src="js/bookTour.js"></script>
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
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="container-fluid bg-3 text-center">
            <div>
              @if (Session::has('flash_message'))
                <div class="alert alert-success" style="text-align: left;">
                  {!! Session::get('flash_message') !!}
                </div>
              @endif
            </div>
            <h1 style="font-size: 40px;margin-bottom: 10px;">Hot Tours
              <button class="btn btn-default" style="text-align:right;" data-toggle="modal" data-target="#modalAddTour" ><i class="glyphicon glyphicon-plus"></i></button>
              @include('tour.tour-modal')
            </h1>
            <hr style="width: 30%; margin-left:35%;">
            <div class="row" id="addTour-list">
              @foreach($join_city as $join)
              <div class="col-sm-4" id="div-addTour-{{$join->id}}" data-addTour-id="{{$join->id}}">
                <img src="source/img/{{$join->tour_image}}" class="tour-image" style="width:100%" alt="Image">
                <div style="height: 150px;">
                  <h2 hidden>{{$join->id}}</h2>
                  <h2 class="tour-name" >{{$join->tour_name}}</h2>
                  <h2 class="tour-price" style="font-size: 20px;">Price: ${{number_format($join->tour_price)}}</h2>
                  <h2 class="tour-from" hidden>{{$join->name}}</h2>
                  <h2 class="tour-to" hidden>{{$join->name}}</h2>
                  <h2 class="tour-start" hidden>{{$join->tour_start_time}}</h2>
                  <h2 class="tour-end" hidden>{{$join->tour_end_time}}</h2>
                  <h2 class="tour-member" hidden>{{$join->tour_member}}</h2>
                  <a href="{{route('tourDetail',$join->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
                  <a class="btn btn-default" data-toggle="modal" data-target="#modalTourDetail"><i class="glyphicon glyphicon-plus"></i></a>
                  @include('tour.tourdetail.tour-detail-modal')
                  <a class="btn btn-default" onclick="editAddTour(this)" role="button"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a href="{{route('deleteTour',$join->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">{{$tour->links()}}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#tours" href="#collapse2">
            Tour List
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
