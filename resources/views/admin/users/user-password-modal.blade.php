<div id="password-modal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myPasswordLabel" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header">
          <h3>Change Password <span class="extra-title muted"></span></h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <form action="{{ route('updatePassword') }}" method="post" id="insert-password-form">
            @if(session('msg'))
            <div class="alert alert-info">  {{session('msg')}}</div>
            @endif
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <input type="hidden" name="id">
            </div>
            <div class="form-group">
              <label>Current Password</label>
              <input type="password" name="curPassword" class="form-control" />
              <span style="color:red">{{ $errors->first('old_password') }}</span>
            </div>
            <div class="form-group">
              <label>New Password</label>
              <input type="password" name="curPassword" class="form-control" />
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" name="confPassword" class="form-control" />
            </div>
            <div align="right"> <input type="submit" value="Update Password" class="btn btn-primary"></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
