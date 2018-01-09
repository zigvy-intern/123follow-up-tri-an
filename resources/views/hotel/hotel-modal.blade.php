<style>
  .district{
    display: none !important;
  }
  .ward{
    display: none !important;
  }
</style>
<div id="modalAddHotel" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalAddHotel" aria-hidden="true">
  <div class="modal-hotel" style="margin: 50px 200px 70px 200px;" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="add-hotel-modal-text">Add New Hotel</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;" >
          <form method="POST" enctype="multipart/form-data" id="insert-hotel-form" >
            <div class="form-group">
              <input type="hidden" name="id" >
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Hotel Name</h3>
              <input type="text" class="form-control" name="add_hotel_name" id="add_hotel_name">
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Owner of Hotel</h3>
              <input type="text" class="form-control" name="add_hotel_owner" id="add_hotel_owner">
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Address</h3>
              <input type="text" class="form-control" name="add_hotel_address" id="add_hotel_address">
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">City</h3>
              <select class="form-control" name="add_hotel_city" id="add_hotel_city">
                <option selected>Choose..</option>
                @foreach($city as $c)
                  <option value="{{$c->matp}}" data-city="{{$c->matp}}">{{$c->city_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">District</h3>
              <select class="form-control" name="add_hotel_district" id="add_hotel_district">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;">Ward</h3>
              <select class="form-control" name="add_hotel_ward" id="add_hotel_ward">
                <option selected disabled>Choose..</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3 style="margin-bottom:10px;" >Image</h3>
              <input type="file" class="image form-control" name="add_hotel_image" id="add_hotel_image">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="addHotel" id="addHotel" onclick="validateHotelForm()" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
