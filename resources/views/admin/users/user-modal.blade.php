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
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group">
              <h3>Name</h3>
              <input type="text" name="name" id="name" class="form-control" />
            </div>
            <div class="form-group">
              <h3>Day of Birth</h3>
              <input type="date" name="birthday" id="birthday" class="form-control" />
            </div>
            <div class="form-group">
              <h3>Email</h3>
              <input type="email" name="email" id="email" class="form-control" />
            </div>
            <div class="form-group">
              <h3>Number Phone</h3>
              <input type="text" name="phone" id="phone" class="form-control" />
            </div>
            <div class="form-group">
              <h3>Address</h3>
              <input type="text" name="address" id="address" class="form-control" />
            </div>
            <div class="form-group">
              <h3>Password</h3>
              <input type="password" name="password" id="password" class="form-control" />
            </div>
            <div class="form-group">
              <div class="col-xs-6" style="margin-left: -15px;">
                <h3>Role</h3>
                <select name="role" id="role" class="form-control">
                  @foreach($role as $ro)
                  <option value="{{$ro->name}}">{{$ro->name}}</option>
                  @endforeach
               </select>
             </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6" style="margin-left: 15px;">
                <h3>Title</h3>
                <select name="title" id="title" class="form-control">
                  @foreach($title as $tit)
                  <option value="{{$tit->title_name}}">{{$tit->title_name}}</option>
                  @endforeach
               </select>
             </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="submitUser()" name="add" id="add" value="Add" class="btn btn-primary"> Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
