<div id="modalBookHotel" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myBookHotelLabel" aria-hidden="true">
  <div class="modal-hotel" style="margin: 40px 20px 40px 50px;" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-user" id="book-hotel-modal-text">Book New Hotel</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;">
          <form method="POST" enctype="multipart/form-data" id="insert-book-hotel-form">
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group col-md-4">
              <h3 style="margin-bottom:10px;">City</h3>
              <select class="form-control" name="book_hotel_city" id="book_hotel_city">
                <option selected disabled>Choose..</option>
                @foreach($city as $c)
                  <option value="{{$c->matp}}" data-city="{{$c->matp}}">{{$c->city_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-4">
              <h3 style="margin-bottom:10px;">District</h3>
              <select class="form-control" name="book_hotel_district" id="book_hotel_district">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <h3 style="margin-bottom:10px;">Ward</h3>
              <select class="form-control" name="book_hotel_ward" id="book_hotel_ward">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Hotel Name</h3>
              <select class="form-control" name="book_hotel_name" id="book_hotel_name">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>Address</h3>
              <input type="text" class="form-control" name="book_hotel_address" id="book_hotel_address">
            </div>
            <div class="form-group col-md-4">
              <h3>Type Room</h3>
              <select class="form-control" name="book_hotel_type" id="book_hotel_type">
                <option selected disabled>Choose..</option>
                </select>
            </div>
            <div class="form-group col-md-4">
              <h3>Check in</h3>
              <div class='input-group date' style="width: 100%;" >
                <input type='text' class="form-control" name="book_check_in" id='book_check_in' style="border-radius:4px;"/>
              </div>
            </div>
            <script type="text/javascript">
              $('#book_check_in').datetimepicker();
            </script>
            <div class="form-group col-md-4">
              <h3>Check out</h3>
              <div class='input-group date' style="width: 100%;" >
                <input type='text' class="form-control" name="book_check_out" id='book_check_out' style="border-radius:4px;"/>
              </div>
            </div>
            <script type="text/javascript">
              $('#book_check_out').datetimepicker();
            </script>
            <div class="form-group col-md-4">
              <h3>Hotel Price</h3>
              <input type="text" class="form-control" name="book_hotel_price" id="book_hotel_price" readonly>
            </div>
            <div class="form-group col-md-4">
              <h3>Nights</h3>
              <input type="text" class="form-control" name="book_hotel_night" id="book_hotel_night" readonly>
            </div>
            <div class="form-group col-md-4">
              <h3><b>Total Price</b></h3>
              <b><input class="form-control" name="book_hotel_totalPrice" id="book_hotel_totalPrice" readonly></b>
            </div>
            <div class="form-group col-md-4">
              <h3>Customer Name</h3>
              <input class="form-control" name="book_hotel_cus" id="book_hotel_cus">
            </div>
            <div class="form-group col-md-4">
              <h3>Identity Card</h3>
              <input class="form-control" name="book_hotel_card" id="book_hotel_card">
            </div>
            <div class="form-group col-md-4">
              <h3>Number Phone of Customer</h3>
              <input class="form-control" name="book_hotel_phone" id="book_hotel_phone">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="validateFormBookHotel()" name="bookHotel" id="bookHotel" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
