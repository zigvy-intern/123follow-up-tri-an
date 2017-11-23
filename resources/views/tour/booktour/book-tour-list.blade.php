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
    @include('tour.booktour.booking-tour-modal')
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
          <th>Phone Number</th>
          <th>Address</th>
          <th>Members</th>
          <th>Time</th>
          <th>Total Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($join_table as $join)
          <tr position="#" id="tr-bookTour-{{$join->id}}" data-bookTour-id="{{$join->id}}" >
            <td>{{ $join-> id }}</td>
            <td class='book-choose-id'>{{ $join->tour_name }}</td>
            <td class='book-cus-id'>{{ $join->book_cus_name }} </td>
            <td class='book-email'>{{ $join->book_email }}</td>
            <td class='book-phone'>{{ $join->book_phone }} </td>
            <td class='book-address'>{{ $join->book_address }}</td>
            <td class='book-member'>{{ $join->book_member }} </td>
            <td class='book-time'>{{ $join->book_time }} </td>
            <td class='book-price' hidden>{{ $join->book_price }} </td>
            <td class='book-totalPrice'>${{number_format($join->book_total_price) }} </td>
            <td><button class="btn btn-default" onclick="editBookTour(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookTour',$join->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
