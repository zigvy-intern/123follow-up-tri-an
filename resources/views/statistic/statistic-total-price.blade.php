<div id="modalTotalPriceHotel" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalTotalPriceHotel" aria-hidden="true">
  <div class="modal-hotel" style="margin: 40px 250px 0px 250px;" >
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-user" id="total-price-modal-text">Total Price of Hotel</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;">
          <form method="POST" enctype="multipart/form-data" id="insert-total-price-form">
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Hotel Name</h3>
              <select class="form-control" name="total_price_hotel_id" id="total_price_hotel_id">
                <option selected disabled>Choose..</option>
                @foreach($hotel as $h)
                  <option value="{{$h->id}}">{{$h->hotel_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Total Price</h3>
              <input class="form-control" name="total_price_hotel" id="total_price_hotel">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
