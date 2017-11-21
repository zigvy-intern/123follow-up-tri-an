@extends('master')
@section('content')
<div class="tour-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="addTours">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#addTours" href="#collapse1">
            Hot Tours
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          <div class="container-fluid bg-3 text-center">
            <h1 style="font-size: 40px;margin-bottom: 10px;">Hot Tours
              <button class="btn btn-default" style="text-align:right;" data-toggle="modal" data-target="#modalTour" ><i class="glyphicon glyphicon-plus"></i></button>
              @include('tour.tour-modal')
            </h1>
            <hr style="width: 30%; margin-left:35%;">
            <div class="row">
              @foreach($tour as $to)
              <div class="col-sm-4">
                <img src="source/img/{{$to->tour_image}}" class="img-responsive" style="width:100%" alt="Image">
                <div class="caption">
                  <h2 >{{$to->tour_name}}</h2>
                  <h3 style="font-size: 20px;">Price: ${{number_format($to->tour_price)}}</h3>
                  <a href="{{route('tourDetail',$to->id)}}" type="submit" value="Detail" class="btn btn-info">Detail</a>
                  <a href="{{route('editTour',$to->id)}}" class="btn btn-warning" role="button" data-toggle="modal" data-target="#modalTour"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a href="{{route('deleteTour',$to->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">{{$tour->links()}}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
