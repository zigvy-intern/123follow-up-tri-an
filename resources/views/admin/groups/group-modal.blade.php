<div id="modalgroup" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-group" id="group-modal-text">Add new group</h4>
      </div>
      <div class="modal-body">
        <div class="form-group mx-sm-3">
            <form method="post" id="insert_form">
              <div class="row">
                <div class="col-xs-6 .col-md-4">
                  <label for="groupname">Group</label>
                  <input type="text" class="form-control is-valid" id="groupname" name="groupname" placeholder="Group name" required>
                </div>
                <div class="col-xs-6 .col-md-4">
                  <label for="leader">Leader</label>
                  <input type="text" class="form-control is-valid" id="leader" name="leader" placeholder="Leader name"  required>
                </div>
              </div>
              <br />
              <div class="row">
                <div class="col-xs-6 .col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading">List Users
                    </div>
                    <div class="panel-body">
                      <div class="checkbox" name="users" value="Yes">
                        @foreach($user as $u)
                        <div class="form-check">
                          <label class="form-check-label">
                            <input class="form-check-input" onChange="handleSelectUser(this)" data-user-id="{{$u->id}}" type="checkbox" value="">
                              {{ $u->name }}
                          </label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xs-6 .col-md-4">
                  <div class="panel panel-primary">
                    <div class="panel-heading">Users accept</div>
                      <div class="list-group users-selected" name="members" id="members">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 .col-sm-6 .col-md-8">
                  <label for="job">Job</label>
                  <textarea class="form-control is-valid" rows="3" name="job" id="job" ></textarea>
                  <br />
                </div>
              </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitGroup()" name="insertgroup" id="insertgroup" value="Insert" class="btn btn-success"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
