<div id="modalTourDetail" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalAddTour" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="tour-detail-text">INFORMATION OF TOUR</h4>
      </div>
      <div class="modal-body" >
        <form method="POST" enctype="multipart/form-data" action="#">
          {{csrf_field()}}
          <div class="row" style="text-align:left;" id="insert-tour-detail-form">
            @if(Session::has('err_file'))
              <div class="alert alert-danger">
                {{Session::get('err_file')}}
              </div>
            @endif
            <div class="form-group col-md-12">
              <h3>Images for slide</h3>
              <input type="file" class="form-control" name="add_tour_detail_image">
            </div>
            <div class="form-group col-md-12">
              <h3>Journey</h3>
              <textarea name="add_journey" id="add_journey" rows="10" cols="65">
              </textarea>
            </div>
            <div class="form-group col-md-12" style="text-align:right;">
              <button name="addTourDetail" class="btn btn-primary"> Add </button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
