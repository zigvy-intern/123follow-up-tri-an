<div id="myTitle" class="modal fade"  tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="title-modal-text">Add new Title</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="POST" enctype="multipart/form-data" id="insert-form">
            <input type="hidden" name="id">
            <div class="form-group">
              <h3>Title Name</h3>
              <input type="text" class="form-control" name="title_name" id="title_name" >
            </div>
            <div class="form-group">
              <h3>Status</h3>
              <select name="title_status" id="title_status" class="form-control">
                <option disabled selected value="none">Select status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
             </select>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="validateTitleForm()" name="insert" id="insert" value="Insert" class="btn btn-primary"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
