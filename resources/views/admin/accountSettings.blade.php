@extends('master')
@section('content')
<div class="account-settings-container">
  <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          Account settings
        </a>
      </h4>
    </div>
    <div id="collapse1" class="panel-collapse collapse in">
      <div class="panel-body">
        <div class="account-container">
          @include('admin.titles.title-list')
        </div>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          User profile
        </a>
      </h4>
    </div>
    <div id="collapse2" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="user-profile-container">
          this is user profile
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- <div id="accordion" role="tablist">
    <div class="card">
      <div class="card-header" role="tab" id="headingOne">
        <h5 class="mb-0">
          <a data-toggle="collapse" href="#collapseOne" aria-controls="collapseOne">
            Account settings
          </a>
        </h5>
      </div>

      <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="account-container">
          this is account settings
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" role="tab" id="headingTwo">
        <h5 class="mb-0">
          <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-controls="collapseTwo">
            User profile
          </a>
        </h5>
      </div>
      <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="user-profile-container">
          this is user profile
        </div>
      </div>
    </div>
  </div> -->
</div>

@endsection
