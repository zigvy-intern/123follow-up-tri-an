<div id="password-modal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myPasswordLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h3>Change Password <span class="extra-title muted"></span></h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" id="insert-user-form">
          <input type="hidden" name="id">
          <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="cur_password" id="cur_password" class="form-control" />
          </div>
          <div class="form-group">
            <label>New Password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" />
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="con_password" id="con_password" class="form-control" />
          </div>
          <div class="modal-footer">
            <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button href="#" class="btn btn-primary" onclick="#" id="password_modal_save">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
