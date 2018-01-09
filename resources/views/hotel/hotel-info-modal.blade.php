<div id="modalHotelRoom" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalHotelRoom" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="hotel-room-modal-text">Add Room</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;" >
          <form method="POST" enctype="multipart/form-data" onsubmit="return validateRoomForm()" id="insert-hotel-room-form" >
            <div class="form-group">
              <input type="hidden" name="id" >
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Hotel</h3>
              <select class="form-control" name="hotel_room_name" id="hotel_room_name">
                <option selected disabled>Choose..</option>
                @foreach($hotel as $h)
                  <option value="{{$h->id}}">{{$h->hotel_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Type Room</h3>
              <select class="form-control" name="hotel_room_type" id="hotel_room_type">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Price</h3>
              <input type="text" class="form-control" name="hotel_room_price" id="hotel_room_price">
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Numbers Room</h3>
              <input type="text" class="form-control" name="hotel_room_numbers" id="hotel_room_numbers">
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Status Room</h3>
              <select class="form-control" name="hotel_room_status" id="hotel_room_status">
                <option selected disabled>Choose..</option>
                @foreach($status as $st)
                  <option value="{{$st->id_status}}">{{$st->status}}</option>
                @endforeach
              </select>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="addRoom" id="addRoom" onclick="submitRoom()" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
