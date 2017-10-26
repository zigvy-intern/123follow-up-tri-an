<div id="addgroup" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-group" id="myModalLabel">Add new group</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <form method="post" id="insert-form">
            <div class="form-group">
              <label>Group name</label>
              <input type="text" name="groupname" id="groupname" class="form-control" />
              <br />
            </div>
            <div class="form-group">
              <label>Leader</label>
              <input type="text" name="leader" id="leader" class="form-control" />
              <br />
            </div>
            <div class="form-group">
              <label>Members</label>
              <input type="text" name="members" id="members" class="form-control" />
              <br />
            </div>
              <div class="form-group">
              <label>Job</label>
              <input type="text" name="job" id="job" class="form-control" />
              <br />
            </div>
            <div class="form-group">
              <label>Create day</label>
              <input type="text" name="createday" id="createday" class="form-control" />
              <br />
            </div>
            <div class="form-group">
              <label>Deadline</label>
              <input type="text" name="deadline" id="deadline" class="form-control" />
              <br />
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitCreateGroup()" name="insert" id="insert" value="Insert" class="btn btn-success"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
