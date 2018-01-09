<div id="modalAddTour" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalAddTour" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="add-tour-modal-text">Add New Tour</h4>
      </div>
      <div class="modal-body" >
        <div class="row" style="text-align:left;" >
          <form method="POST" enctype="multipart/form-data" id="insert-tour-form">
            <div class="form-group">
              <input type="hidden" name="id" >
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
                  <option value="{{$c->matp}}" data-city="{{$c->matp}}">{{$c->city_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>To</h3>
              <select class="form-control" name="add_tour_to" id="add_tour_to">
                <option>Choose..</option>
                @foreach($city as $c)
                  <option value="{{$c->matp}}" data-city="{{$c->matp}}">{{$c->city_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>Start Time</h3>
              <div class='input-group date' style="width: 100%;" >
                <input type='text' class="form-control" name="add_start_time" id='add_start_time' style="border-radius:4px;"/>
              </div>
            </div>
            <script type="text/javascript">
              $('#add_start_time').datetimepicker();
            </script>
            <div class="form-group col-md-6">
              <h3>End Time</h3>
              <div class='input-group date' style="width: 100%;" >
                <input type='text' class="form-control" name="add_end_time" id='add_end_time' style="border-radius:4px;"/>
              </div>
            </div>
            <script type="text/javascript">
              $('#add_end_time').datetimepicker();
            </script>
            <div class="form-group col-md-6">
              <h3>Number Members</h3>
              <select type="number" name="add_tour_member" id="add_tour_limit" class="form-control">
                <option selected>Choose...</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
                <option value="30">30</option>
                <option value="35">35</option>
                <option value="40">40</option>
                <option value="45">45</option>
                <option value="50">50</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <h3>Price</h3>
              <input type="number" class="form-control" name="add_tour_price" id="add_tour_price" placeholder="$">
            </div>
            <div class="form-group col-md-6">
              <h3>Image</h3>
              <input type="file" class="form-control" name="add_tour_image" id="add_tour_image">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="addTour" id="addTour" onclick="validateTourForm()" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
