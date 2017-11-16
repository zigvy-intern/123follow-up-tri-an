<div id="modalHotel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="hotel-modal-text">New Hotel</h4>
      </div>
      <div class="modal-body">
        <form method="post" id="add-hotel">
          <div class="row">
            <div class="col-xs-6 col-md-4" style="margin-left: -15px;">
              <h3 style="margin-bottom: 5px;">Name:</h3>
              <input type="text" class="form-control is-valid" id="hotelName" name="hotelName" placeholder="Hotel Name" required>
            </div>
          </div>
          <br />
          <div class="row">
            <h3 style="margin-bottom: 5px;">Image:</h3>
            <input type="file" class="form-control-file" id="avatar">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
