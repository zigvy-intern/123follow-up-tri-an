<div id="modalTour" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalAddTour" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="tour-modal-text">Add Tour</h4>
      </div>
      <div class="modal-body" >
        <div class="row" style="text-align:left;" id="insert-tour-form">
          <div class="form-group col-md-6">
            <h3>Tour ID</h3>
            <input type="text" class="form-control" id="add_tour_id">
          </div>
          <div class="form-group col-md-6">
            <h3>Tour Name</h3>
            <input type="text" class="form-control" id="add_tour_name">
          </div>
          <div class="form-group col-md-6">
            <h3>From</h3>
            <input type="text" class="form-control" id="add_tour_from">
          </div>
          <div class="form-group col-md-6">
            <h3>To</h3>
            <input type="text" class="form-control" id="add_tour_to">
          </div>
          <div class="form-group col-md-6";>
            <h3>Departure Time</h3>
            <input type="datetime-local" class="form-control" id="add_tour_time">
          </div>
          <div class="form-group col-md-6">
            <h3>Number Members</h3>
            <select id="add_tour_member" class="form-control">
              <option selected>Choose...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
            </select>
          </div>
          <div class="form-group col-md-6">
            <h3>Image</h3>
            <input type="file" class="form-control" id="add_tour_image">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="#" name="addTour" id="addTour" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
