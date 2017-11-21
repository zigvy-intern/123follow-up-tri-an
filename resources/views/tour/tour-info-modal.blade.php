<div id="modalTourInfo" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalTourLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour-info" id="tour-info-modal-text">Edit Tour Infomation</h4>
      </div>
      <div class="modal-body" id="insert-tour-info-form" >
        <div class="row" style="text-align:left;">
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
            <select name="loai" class="form-control" id="add_tour_form">
                <option>Choose..</option>
              @foreach($getCountry as $coun)
                <option value="{{$coun->id}}">{{$coun->country_name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <h3>To</h3>
            <select name="loai" class="form-control" id="add_tour_form">
              <option>Choose..</option>
              @foreach($getCountry as $coun)
                <option value="{{$coun->id}}">{{$coun->country_name}}</option>
              @endforeach
            </select>
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
        <button type="button" onclick="#" name="infoSave" id="infoSave" class="btn btn-primary"> Save </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
