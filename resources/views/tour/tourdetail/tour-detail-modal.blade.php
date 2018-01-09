<div id="modalTourInfo" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalTourInfo" aria-hidden="true">
  <div class="modal-info"  style="margin: 50px 200px 70px 200px;" >
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-tour" id="tour-info-text">INFORMATION OF TOUR</h4>
      </div>
      <div class="modal-body">
        <div class="row" style="text-align:left;">
          <form method="POST" enctype="multipart/form-data"  id="insert-tour-info-form">
            <div class="form-group">
              <input type="hidden" name="id" >
            </div>
            <div class="form-group col-md-12" hidden>
              <h3 style="margin-bottom: 10px;">Tour Name</h3>
              <input type="text" class="form-control" name="tour_info_name" id="tour_info_name">
            </div>
            <div class="form-group col-md-12">
              <h3 style="margin-bottom: 10px;">Images for slide</h3>
              <input type="file" class="form-control" multiple="multiple" name="tour_info_image[]" id="tour_info_image">
            </div>
            <div class="form-group col-md-12">
              <h3 style="margin-bottom: 10px;">Journey</h3>
              <textarea name="tour_info_journey" id="tour_info_journey" rows="10" cols="80">
              </textarea>
            </div>
            <script>
              CKEDITOR.replace('tour_info_journey');
            </script>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button name="addTourInfo" onclick="submitTourInfo()" id="addTourInfo" class="btn btn-primary"> Add </button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
