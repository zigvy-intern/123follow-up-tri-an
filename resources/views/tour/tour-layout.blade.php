@extends('master')
@section('content')
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
                  <a href="{{route('tourDetail',$to->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
                  <a href="{{route('editTour',$to->id)}}" class="btn btn-default" role="button" data-toggle="modal" data-target="#modalTour"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a href="{{route('deleteTour',$to->id)}}" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
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
          <div class="row">
            <div class="bookingTourForm" style="margin-top: -15px;">
              <div class="btn-group" onkeyup="#">
                <select name="select-tour" id="select-tour" class="form-control" style="margin-top: 8px;">
                  @foreach($tour as $tou)
                  <option value="{{$tou->id}}">{{$tou->tour_name}}</option>
                  @endforeach
                </select>
              </div>
              <button class="btn btn-primary " data-toggle="modal" data-target="#modalBookTour" style="margin-top: 8px;" ><i class="glyphicon glyphicon-plus"></i></button>
              @include('tour.booking.booking-tour-modal')
              <form action="" class="navbar-form navbar-right" method="post">
                <div class="form-group input-group">
                  <input type="text" onkeyup="" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <div class="table" style="font-size: 15px;">
              <table id='bookTour-list' class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tour Name</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Number Phone</th>
                    <th>Address</th>
                    <th>Members</th>
                    <th>Time</th>
                    <th>Total Price</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($bookingTour as $bt)
                    <tr position="#" id="tr-bookTour-{{$bt->id}}" data-bookTour-id="{{$bt->id}}" >
                      <td>{{ $bt-> id }}</td>
                      <td class='book-choose-id'>{{ $bt->book_tour_id }}</td>
                      <td class='book-cus-id'>{{ $bt->book_cus_name }} </td>
                      <td class='book-email'>{{ $bt->book_email }}</td>
                      <td class='book-phone'>{{ $bt->book_phone }} </td>
                      <td class='book-address'>{{ $bt->book_address }}</td>
                      <td class='book-member'>{{ $bt->book_member }} </td>
                      <td class='book-time'>{{ $bt->book_time }} </td>
                      <td class='book-price' hidden>{{ $bt->book_price }} </td>
                      <td class='book-totalPrice'>${{number_format($bt->book_total_price) }} </td>
                      <td><button class="btn btn-default" onclick="editBookTour(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                          <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookTour',$bt->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
