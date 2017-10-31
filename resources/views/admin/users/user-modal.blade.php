<div id="myUser" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myUserLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-user" id="user-modal-text">Add New User</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" id="insert-user-form">
            <input type="hidden" name="id">
            <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" />
            </div>
            <div class="form-group">
              <label>Day of Birth</label>
              <input type="date" name="birthday" id="birthday" class="form-control" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <label>Number Phone</label>
              <input type="text" name="phone" id="phone" class="form-control" />
            </div>
            <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" id="address" class="form-control" />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label>Role</label>
                <select name="role" id="role" class="form-control">
                  <option value="Admin">Admin</option>
                  <option value="Manager">Manager</option>
                  <option value="User">User</option>
               </select>
             </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label>Title</label>
                <select name="title" id="title" class="form-control">
                  <option value="CFO">CFO</option>
                  <option value="CEO">CEO</option>
                  <option value="SEO">SEO</option>
                  <option value="Senior">Senior</option>
                  <option value="Junior">Junior</option>
               </select>
             </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitUser()" name="add" id="add" value="Add" class="btn btn-success"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
