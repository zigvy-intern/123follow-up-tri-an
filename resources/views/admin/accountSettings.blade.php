@extends('master')
@section('content')
<div class="account-settings-container">
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            Account Setting
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          <ul class="nav nav-tabs" id="form-account" role="tablist">
            <li class="nav-form active">
              <a class="nav-link" id="title-tab" data-toggle="tab" href="#title" role="tab" aria-controls="title" aria-selected="true">Title</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="group-tab" data-toggle="tab" href="#group" role="tab" aria-controls="group" aria-selected="false">Group</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">User</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="role-tab" data-toggle="tab" href="#role-tab-content" role="tab" aria-controls="role" aria-selected="false">Role</a>
            </li>
          </ul>
          <div class="tab-content" id="form-content">
            <div class="tab-pane fade" id="title" role="tabpanel" aria-labelledby="title-tab">
              @include('admin.titles.title-list')
            </div>
            <div class="tab-pane fade" id="group" role="tabpanel" aria-labelledby="group-tab">
              @include('admin.groups.group-list')
            </div>
            <div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
              @include('admin.users.user-list')
            </div>
            <div class="tab-pane fade" id="role-tab-content" role="tabpanel" aria-labelledby="role-tab">
              @include('admin.roles.role-list')
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            User Profile
          </a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
          @include('admin.users.user-profile')
      </div>
    </div>
  </div>
</div>
</div>
@endsection
