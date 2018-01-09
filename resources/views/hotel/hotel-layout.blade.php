@extends('master')
@section('content')
<style>
  .fil-district{
    display: none !important;
  }
  .fil-ward{
    display: none !important;
  }
</style>
<script src="js/addHotel.js"></script>
<script src="js/bookHotel.js"></script>
<script src="js/price.js"></script>
<div class="hotel-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="bookHotels">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#bookHotels" href="#vietnam">Hot Hotels</a>
        </h4>
      </div>
      <div id="vietnam" class="panel-collapse collapse">
        <div class="panel-body">
          <div class="form-group input-group">
            <input type="text" onkeyup="onHotelSearch(this)" class="form-control" style="width: 200px; margin: 10px;">
            <button class="btn btn-default" type="button" style="margin: 10px -12px;"><i class="glyphicon glyphicon-search"></i></button>
          </div>
          <div class="container-fluid bg-3 text-center">
            <h1 style="font-size: 40px;margin-bottom: 10px;">Hot Hotels
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalAddHotel" title="Add Tour"><i class="glyphicon glyphicon-plus"></i></button>
              @include('hotel.hotel-modal')
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modalHotelRoom" title="Add Room"><i class="fa fa-dollar" style="font-size:17px;"></i></button>
              @include('hotel.hotel-info-modal')
            </h1>
            <hr style="width: 30%; margin-left:35%;">
            <div class="row" id="addHotel-list">
            @foreach($join_hotel as $hotel)
              <div class="hotel-item col-sm-4" id="addhotel-{{$hotel->id}}" data-addhotel-id="{{$hotel->id}}">
                <img class="hotel-image" data-image="{{$hotel->hotel_image}}" src="source/img/hotel/{{$hotel->hotel_image}}" style="width:100%" alt="Image">
                <div class='hotel-content' id="addroom-{{$hotel->hotel_room_id}}" data-addroom-id="{{$hotel->hotel_room_id}}" style="height: 150px;">
                  <h2 hidden>{{$hotel->id}}</h2>
                  <h2 class="hotel-name" data-hotel-id="{{$hotel->id}}">{{$hotel->hotel_name}}</h2>
                  <h2 class="hotel-owner">{{$hotel->hotel_owner}}</h2>
                  <h2 class="hotel-city-id" data-city-id="{{$hotel->hotel_city_id}}" hidden>{{$hotel->city_name}}</h2>
                  <h2 class="hotel-district-id" data-district-id="{{$hotel->hotel_district_id}}" hidden>{{$hotel->district_name}}</h2>
                  <h2 class="hotel-ward-id" data-ward-id="{{$hotel->hotel_ward_id}}" hidden>{{$hotel->ward_name}}</h2>
                  <h2 class="hotel-address" hidden>{{$hotel->hotel_address}}</h2>
                  <h2 hidden>{{$hotel->hotel_room_id}}</h2>
                  <h2 class="room-hotel-id" data-hotel="{{$hotel->hotel_id}}" hidden>{{$hotel->hotel_id}}</h2>
                  <h2 class="room-type" data-type="{{$hotel->type_room_id}}" hidden>{{$hotel->type_room_id}}</h2>
                  <h2 class="room-price" hidden>{{$hotel->room_price}}</h2>
                  <h2 class="room-numbers" hidden>{{$hotel->room_numbers}}</h2>
                  <h2 class="room-status" data-status="{{$hotel->room_status}}" hidden>{{$hotel->room_status}}</h2>
                  <h2 class="hotel-price" data-price="{{$hotel->room_price}}" style="font-size: 20px;">Average Price: ${{$hotel->room_price}}</h2>
                  <a href="{{route('hotelDetail',$hotel->id)}}" type="submit" value="Detail" class="btn btn-default"><strong>Detail</strong></a>
                  <a class="btn btn-default" onclick="editAddHotel(this)" role="button" title="Edit Hotel"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-default" onclick="editRoom(this)" role="button" title="Edit Room"><i class="fa fa-pencil-square-o" style="font-size:20px;"></i></a>
                  <a href="{{route('deleteHotel',$hotel->id)}}" class="btn btn-default" title="Delete Hotel"><i class="glyphicon glyphicon-remove"></i></a>
                </div>
              </div>
              @endforeach
            </div>
            <div class="row">{{$join_hotel->links()}}</div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#bookHotels" href="#hotelList">
            Booked Hotel Room List
          </a>
        </h4>
      </div>
      <div id="hotelList" class="panel-collapse collapse">
        <div class="panel-body">
          @include('hotel.bookhotel.book-hotel-list')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
