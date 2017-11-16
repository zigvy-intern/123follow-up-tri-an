<div id="modalHotelDetail" class="modal fade" role="dialog">
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
                  <a data-toggle="collapse" data-parent="#detailHotel" href="#collapse3">
                    Rooms
                  </a>
                  <button type="button" name="addroom" id="addroom" value="addname" class="btn btn-primary btn-sm"> Add</button>
                </h4>
              </div>
              <div id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="form-group mx-sm-3">
                      <form method="post" id="infor">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="type_room">Type Room</label>
                            <div class="form-group">
                              <select name="type" id="type_room" class="form-control">
                                <option disabled selected value="none">Select room</option>
                                <option value="single">Single room</option>
                                <option value="double">Double room</option>
                             </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label for="price_room">Price:</label>
                            <div class="form-group">
                              <input type="text" class="form-control is-valid" id="price_room" name="price_room" placeholder="Price" required>
                            </div>
                          </div>
                        </div>
                      </form>
                  </div>
              </div>
              </div>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#detailHotel" href="#collapse2">
                    Detail
                  </a>
                  <button type="button" id="savedetail" class="btn btn-primary btn-sm ">Add</button>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#slide">Slide</a></li>
                      <li><a data-toggle="tab" href="#description">Description</a></li>
                      <li><a data-toggle="tab" href="#promotion">Promotion</a></li>
                    </ul>
                    <div class="tab-content">
                      <div id="slide" class="tab-pane fade in active">
                        <form method="post" id="insert-slide">
                          <div class="form-group">
                            <label for="exampleFormControlFile1">Image 1:</label>
                            <input type="file" class="form-control-file" id="slide1">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlFile1">Image 2:</label>
                            <input type="file" class="form-control-file" id="slide2">
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlFile1">Image 3:</label>
                            <input type="file" class="form-control-file" id="slide3">
                          </div>
                        </form>
                      </div>
                      <div id="description" class="tab-pane fade">
                        <form method="post" id="insert-description">
                          <textarea name="insert-description" id="insert-description" rows="10" cols="80">
                          ABC
                          </textarea>
                          <script>
                            var editor = CKEDITOR.replace('insert-description',{
                              language:'vi',
                              filebrowserBrowseUrl :'/source/js/ckfinder/ckfinder.html',

                              filebrowserImageBrowseUrl : '/source/js/ckfinder/ckfinder.html?type=Images',

                              filebrowserFlashBrowseUrl : '/source/js/ckfinder/ckfinder.html?type=Flash',

                              filebrowserUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                              filebrowserImageUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                              filebrowserFlashUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            });
                          </script>
                    		</form>
                      </div>
                      <div id="promotion" class="tab-pane fade">
                        <form method="post" id="insert-promotion">
                          <script>
                            var editor = CKEDITOR.replace('insert-promotion',{
                              language:'vi',
                              filebrowserBrowseUrl :'/source/js/ckfinder/ckfinder.html',

                              filebrowserImageBrowseUrl : '/source/js/ckfinder/ckfinder.html?type=Images',

                              filebrowserFlashBrowseUrl : '/source/js/ckfinder/ckfinder.html?type=Flash',

                              filebrowserUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

                              filebrowserImageUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

                              filebrowserFlashUploadUrl : '/source/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

                            });
                          </script>
                    		</form>
                      </div>
                    </div>
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
