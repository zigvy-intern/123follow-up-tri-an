<div class="col-xs-12 col-sm-12 toppad" >
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">{{Auth::user()->name}} Profile</h3>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class="col-md-3 col-lg-3" id="profile" align="center">
          <img id="profile-image" alt="User Picture" src="source/img/profile/{{Auth::user()->image}}"  class="img-circle img-responsive">
        </div>
        <div class=" col-md-9 col-lg-9 ">
          <table class="table table-user-information">
            <tbody>
              <tr>
                <td>ID :</td>
                <td id="tr-user-{{Auth::user()->id}}" data-user-id="{{Auth::user()->id}}">{{Auth::user()->id}}</td>
              </tr>
              <tr>
                <td>Your name :</td>
                <td>{{Auth::user()->name}}</td>
              </tr>
              <tr>
                <td>Email :</td>
                <td>{{Auth::user()->email}}</td>
              </tr>
              <tr>
                <td>Date of Birth :</td>
                <td>{{Auth::user()->birthday}}</td>
              </tr>
              <tr>
                <td>Home Address :</td>
                <td>{{Auth::user()->address}}</td>
              </tr>
              <tr>
                <td>Phone Number :</td>
                <td>{{Auth::user()->phone}}</td>
              </tr>
              <tr>
                <td>Title : </td>
                <td>{{Auth::user()->title}}</td>
              </tr>
              <tr>
                <td>Role : </td>
                <td>{{Auth::user()->role_id}}</td>
              </tr>
              <tr>
                <td class="user-password" hidden>{{Auth::user()->password}} </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel-footer">
      <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#password-modal">Change Password</button>

    </div>
    @include('admin.users.user-password-modal')

    <script>
    $(function() {
    $('#profile-image').on('click', function() {
    $('#profile-image-upload').click();
    });
    });
    </script>
  </div>
</div>
