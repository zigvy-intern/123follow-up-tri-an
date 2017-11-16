<div id="addrole" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-group" id="myModalLabel">Add new group</h4>
      </div>
      <div class="modal-body">
        <div class="form-group mx-sm-3">
          <form method="post" id="insert_form">
            <div class="row">
              <div class="col-xs-6 .col-md-4">
                <h3 for="groupname">Group</h3>
                <input type="text" class="form-control is-valid" id="groupname" name="groupname" placeholder="Group name" required>
              </div>
              <div class="col-xs-6 .col-md-4">
                <h3 for="leader">Leader</h3>
                <input type="text" class="form-control is-valid" id="leader" name="leader" placeholder="Leader name"  required>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-xs-6 .col-md-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">List Group</div>
                    <div class="panel-body">
                    </div>
                </div>
              </div>
              <div class="col-xs-6 .col-md-4">
                <div class="panel panel-primary">
                  <div class="panel-heading">Groups accept</div>
                    <div class="list-group groups-selected" >
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 .col-sm-6 .col-md-8">
                <h3 for="job">Job</h3>
                <textarea class="form-control is-valid" rows="3" name="job" id="job" ></textarea>
                <br/>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 .col-md-4">
                <h3 for="createday">Create day</h3>
                <input type="date" name="createday" id="createday" class="form-control" /><br />
              </div>
              <div class="col-xs-6 .col-md-4">
                <h3 for="deadline">Deadline</h3>
                <input type="date" name="deadline" id="deadline" class="form-control" /><br />
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="#" name="insert" id="insert" value="Insert" class="btn btn-primary"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
