  <div class="col-xs-12 col-sm-12 toppad" >
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">{{Auth::user()->name}} Profile</h3>
      </div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-3 col-lg-3 " align="center">
            <img id="profile-image" alt="User Picture" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"  class="img-circle img-responsive">
            <input id="profile-image-upload" class="hidden" type="file">
          </div>
          <div class=" col-md-9 col-lg-9 ">
            <table class="table table-user-information">
              <tbody>
                <tr>
                  <td>ID :</td>
                  <td>{{Auth::user()->id}}</td>
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
                  <td>{{Auth::user()->role}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="panel-footer">
        <a href="#" data-original-title="Edit" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"> Edit </i></a>
      </div>
      <script>
      $(function() {
      $('#profile-image').on('click', function() {
      $('#profile-image-upload').click();
      });
      });
      </script>
    </div>
  </div>
