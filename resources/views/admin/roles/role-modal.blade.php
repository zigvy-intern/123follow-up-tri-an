<div id="modalRole" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="modalRole" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-role" id="role-modal-text">Add New Level</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" enctype="multipart/form-data" onsubmit="return validateRoleForm()" id="insert-role-form">
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group">
              <h3>Level Name</h3>
              <input type="text" name="add_role_name" id="add_role_name" class="form-control">
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitRole()" name="addRole" id="addRole" class="btn btn-primary"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
