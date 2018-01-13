<div class="row">
  @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
  @endif
  <div class="bookTourForm" style="margin-top: -15px;">
    <button class="btn btn-primary " data-toggle="modal" data-target="#modalBookTour" style="margin-top: 8px;" ><i class="glyphicon glyphicon-plus"></i></button>
    @include('tour.booktour.book-tour-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-group input-group">
        <input type="text" onkeyup="onBookTourSearch(this)" class="form-control">
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
          <th>Manager</th>
          <th>Customer</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Members</th>
          <th>Day Order</th>
          <th>Total Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($join_table as $join)
          <tr class="book-content" position="{{$join->tour_name}}" id="tr-booktour-{{$join->id}}" data-booktour-id="{{$join->id}}">
            @if( $join->tours_id == $join->book_tour_id && $join->tour_limit_booking <= $join->booked_tour )
            <td style="color:red;">{{ $join-> id }}</td>
            <td class='book-choose-id' data-tourname-id="{{$join->book_tour_id}}" style="color:red;">{{ $join->tour_name }}</td>
            <td class="book-user-id" data-user-id="{{$join->book_user_id}}" style="color:red;">{{ $join->name}}
            <td class='book-cus-id' style="color:red;">{{ $join->book_cus_name }} </td>
            <td class='book-email' style="color:red;">{{ $join->book_email }}</td>
            <td class='book-phone' style="color:red;">{{ $join->book_phone }} </td>
            <td class='book-address' style="color:red;">{{ $join->book_address }}</td>
            <td class='book-member' style="color:red;">{{ $join->book_member }} </td>
            <td class='book-time' data-time="{{$join->book_time}}" style="color:red;">{{ $join->book_time }} </td>
            <td class='book-price' data-book-price="{{$join->book_price}}" hidden style="color:red;">{{ $join->book_price }} </td>
            <td class='book-totalPrice' data-totalprice="{{$join->book_total_price}}" style="color:red;">${{number_format($join->book_total_price) }} </td>
            <td><button class="btn btn-default" onclick="editBookTour(this)" type="button" style="color:red;"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delTour" type="button" style="color:red;"><a href="{{route('deleteBookTour',$join->id)}}" class="glyphicon glyphicon-remove" style="color:red;"></a></button>
            </td>
            @else
            <td>{{ $join-> id }}</td>
            <td class='book-choose-id' data-tourname-id="{{$join->book_tour_id}}">{{ $join->tour_name }}</td>
            <td class="book-user-id" data-user-id="{{$join->book_user_id}}">{{ $join->name}}
            <td class='book-cus-id'>{{ $join->book_cus_name }} </td>
            <td class='book-email'>{{ $join->book_email }}</td>
            <td class='book-phone'>{{ $join->book_phone }} </td>
            <td class='book-address'>{{ $join->book_address }}</td>
            <td class='book-member'>{{ $join->book_member }} </td>
            <td class='book-time' data-time="{{$join->book_time}}">{{ $join->book_time }} </td>
            <td class='book-price' data-book-price="{{$join->book_price}}" hidden>{{ $join->book_price }} </td>
            <td class='book-totalPrice' data-totalprice="{{$join->book_total_price}}">${{number_format($join->book_total_price) }} </td>
            <td><button class="btn btn-default" onclick="editBookTour(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delTour" type="button"><a href="{{route('deleteBookTour',$join->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
            </td>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
