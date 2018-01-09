<div class="row">
  <div class="bookTourForm" style="margin-top: -15px;">
    <button class="btn btn-primary " data-toggle="modal" data-target="#modalBookHotel" style="margin-top: 8px;" ><i class="glyphicon glyphicon-plus"></i></button>
    @include('hotel.bookhotel.book-hotel-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-group input-group">
        <input type="text" onkeyup="onBookHotelSearch(this)" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
  </div>
  <div class="table" style="font-size: 15px;">
    <table id='bookHotel-list' class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Hotel Name</th>
          <th>Customer</th>
          <th>Identity Card</th>
          <th>Phones</th>
          <th>Type Room</th>
          <th>Check in</th>
          <th>Check out</th>
          <th>Night</th>
          <th>Total Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($book_hotel as $join)
          <tr class="hotel-content" id="tr-bookhotel-{{$join->id}}" data-bookhotel-id="{{$join->id}}" >
            @if($join->hotel_id == $join->id_hotel && $join->room_numbers <= $join->room_booked)
            <td style="color:red;">{{ $join-> id }}</td>
            <td class='hotel-hotel-id' style="color:red;">{{ $join->hotel_name }}</td>
            <td class='hotel-address' style="color:red;" hidden>{{ $join->hotel_address }} </td>
            <td class='hotel-customer' style="color:red;">{{ $join->hotel_customer}}</td>
            <td class='hotel-card' style="color:red;">{{ $join->hotel_identity_card }} </td>
            <td class='hotel-phone' style="color:red;">{{ $join->hotel_cus_phone }} </td>
            <td class='hotel-type-room' style="color:red;">{{ $join->type_room_id }}</td>
            <td class='hotel-check-in' style="color:red;">{{$join->hotel_check_in}}</td>
            <td class='hotel-check-out' style="color:red;">{{$join->hotel_check_in}}</td>
            <td class='hotel-night' style="color:red;">{{ $join->hotel_number_day }} </td>
            <td class='hotel-room-price' style="color:red;" hidden>${{number_format($join->hotel_price) }} </td>
            <td class='hotel-totalPrice' style="color:red;">${{number_format($join->hotel_total_price) }} </td>
            <td><button class="btn btn-default" onclick="editBookHotel(this)" type="button" style="color:red;"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookHotel',$join->id)}}" class="glyphicon glyphicon-remove" style="color:red;"></a></button>
            </td>
            @else
            <td>{{ $join-> id }}</td>
            <td class='hotel-hotel-id'>{{ $join->hotel_name }}</td>
            <td class='hotel-address' hidden>{{ $join->hotel_address }} </td>
            <td class='hotel-customer'>{{ $join->hotel_customer}}</td>
            <td class='hotel-card' >{{ $join->hotel_identity_card }} </td>
            <td class='hotel-phone' >{{ $join->hotel_cus_phone }} </td>
            <td class='hotel-type-room'>{{ $join->type_room_id }}</td>
            <td class='hotel-check-in'>{{$join->hotel_check_in}}</td>
            <td class='hotel-check-out'>{{$join->hotel_check_in}}</td>
            <td class='hotel-night' >{{ $join->hotel_number_day }} </td>
            <td class='hotel-room-price' hidden>${{number_format($join->hotel_price) }} </td>
            <td class='hotel-totalPrice'>${{number_format($join->hotel_total_price) }} </td>
            <td><button class="btn btn-default" onclick="editBookHotel(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookHotel',$join->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
            </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="panel-footer">
      {{$book_hotel->render()}}
    </div>
  </div>
</div>
