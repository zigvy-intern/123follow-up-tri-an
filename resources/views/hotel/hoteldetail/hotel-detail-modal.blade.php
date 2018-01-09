<div id="modalHotelInfo" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalHotelInfo" aria-hidden="true">
  <div class="modal-info"  style="margin: 50px 200px 70px 200px;" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-hotel" id="hotel-info-text">INFORMATION OF HOTEL</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;">
          <form method="POST" enctype="multipart/form-data"  id="insert-hotel-info-form">
            <div class="form-group">
              <input type="hidden" name="id" >
            </div>
            <div class="form-group col-md-12" hidden>
              <h3 style="margin-bottom: 10px;">Hotel Name</h3>
              <input type="text" class="form-control" name="hotel_info_name" id="hotel_info_name">
            </div>
            <div class="form-group col-md-12">
              <h3 style="margin-bottom: 10px;">Images for slide</h3>
              <input type="file" class="form-control" multiple="multiple" name="hotel_info_image[]" id="hotel_info_image">
            </div>
            <div class="form-group col-md-12">
              <h3 style="margin-bottom: 10px;">Infomation of Hotel</h3>
              <textarea name="hotel_info" id="hotel_info" rows="10" cols="80">
              </textarea>
            </div>
            <script>
              CKEDITOR.replace('hotel_info');
            </script>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button name="addHotelInfo" onclick="submitHotelInfo()" id="addHotelInfo" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
