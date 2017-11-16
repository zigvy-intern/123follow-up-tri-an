
<div id="addHotel" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="hotel-modal-text">Add New</h4>
      </div>
      <div class="modal-body">
        <div class="account-settings-container">
          <div class="panel-group" id="detailHotel">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#detailHotel" href="#collapse1">
                    Name
                  </a>
                  <button type="button" onclick="submitHotel()" name="addname" id="addname" value="addname" class="btn btn-primary btn-sm "> Add</button>
                </h4>
              </div>
              <div id="collapse1" class="panel-collapse collapse in">
                <div class="panel-body">
                  <form method="post" id="add-hotel">
                    <div class="row">
                      <div class="col-xs-6 .col-md-4">
                        <label for="hotelName">Name:</label>
                        <input type="text" class="form-control is-valid" id="hotelName" name="hotelName" placeholder="Hotel name" required>
                      </div>
                      </br>
                    </div>
                    <br />
                    <div class="row">
                          <label for="avatar">Image:</label>
                          <input type="file" class="form-control-file" id="avatar">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
