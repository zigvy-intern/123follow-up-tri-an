<div id="modalAddTour" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalAddTour" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="add-tour-modal-text">Add New Tour</h4>
      </div>
      <div class="modal-body" >
        <div class="row" style="text-align:left;" >
          <form method="POST" id="insert-tour-form">
            <div class="form-group">
              <input type="hidden" class="form-control" name="add_tour_id" id="add_tour_id" >
            </div>
            <div class="form-group col-md-6">
              <h3>Tour Name</h3>
              <input type="text" class="form-control" name="add_tour_name" id="add_tour_name">
            </div>
            <div class="form-group col-md-6">
              <h3>From</h3>
              <select class="form-control" name="add_tour_from" id="add_tour_from">
                <option>Choose..</option>
                @foreach($city as $c)
                  <option value="{{$c->name}}">{{$c->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>To</h3>
              <select class="form-control" name="add_tour_to" id="add_tour_to">
                <option>Choose..</option>
                @foreach($city as $c)
                  <option value="{{$c->name}}">{{$c->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>Start Time</h3>
              <input type="datetime-local" class="form-control" name="add_start_time" id="add_start_time">
            </div>
            <div class="form-group col-md-6">
              <h3>End Time</h3>
              <input type="datetime-local" class="form-control" name="add_end_time" id="add_end_time">
            </div>
            <div class="form-group col-md-6">
              <h3>Number Members</h3>
              <select type="text" name="add_tour_member" id="add_tour_member" class="form-control">
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
              <h3>Price</h3>
              <input type="text" class="form-control" name="add_tour_price" id="add_tour_price" placeholder="$">
            </div>
            <div class="form-group col-md-6">
              <h3>Image</h3>
              <input type="file" class="form-control" name="add_tour_image" id="add_tour_image">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="addTour" id="addTour" onclick="submitAddTour()" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
