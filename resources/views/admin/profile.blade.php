@extends('master')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12 col-sm-12 toppad" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">User Profile</h3>
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
                    <td>Your name :</td>
                    <td>Zigvy</td>
                  </tr>
                  <tr>
                    <td>Email :</td>
                    <td>06/23/2013</td>
                  </tr>
                  <tr>
                    <td>Date of Birth :</td>
                    <td>01/24/1988</td>
                  </tr>
                  <tr>
                    <td>Home Address :</td>
                    <td>38 Nguyen Van Troi</td>
                  </tr>
                  <tr>
                    <td>Phone Number :</td>
                    <td>555-4567-890(Mobile)</td>
                  </tr>
                  <tr>
                    <td>Role : </td>
                    <td>Admin</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <a href="#" data-original-title="Edit" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"> Edit </i></a>
        </div>
      </div>
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

@endsection
