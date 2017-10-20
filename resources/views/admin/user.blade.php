@extends('master')
@section('content')
<script src="js/user.js"></script>
<div id="menu-user">
  <div class="form-user">
    <div class="group-tabs">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">
            <a class="btn button" href="{{route('title')}}"><span>Title</span></a>
        </li>
        <li role="presentation">
            <a class="btn button" href="#"><span>Group</span></a>
        </li>
        <li role="presentation">
            <a class="btn button" href="{{route('user')}}"><span>User</span></a>
        </li>
      </ul>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="User">
          <div class="row">
            <div class="createuser">
              <div class="btn-group">
                <select name="role" id="role" class="form-control">
                   <option value="Admin">Admin</option>
                   <option value="User">User</option>
                   <option value="All">All</option>
                </select>
              </div>
              <button class="btn btn-primary " data-toggle="modal" data-target="#myUser" ><i class="glyphicon glyphicon-plus"></i></button>
              <div id="myUser" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myUserLabel" aria-hidden="true">
                <div class="modal-dialog" >
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-user" id="myUserLabel">Add New User</h4>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <form method="post" id="insert_form">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" />
                          </div>
                          <div class="form-group">
                            <label>Role</label>
                            <select name="role" id="role" class="form-control">
                              <option value="Admin">Admin</option>
                              <option value="User">User</option>
                           </select>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" onclick="#" name="add" id="add" value="Add" class="btn btn-success"> Add</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
              <form action="" class="navbar-form navbar-right" method="post">
                <div class="form-group input-group">
                  <input type="text" onkeyup="onUserSearch(this)" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <div class="table">
              <table id='user-list' class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $u)
                    <tr>
                      <td>{{ $u-> id }}</td>
                      <td>{{ $u->name }}</td>
                      <td>{{ $u->email }} </td>
                      <td>{{ $u->password }} </td>
                      <td>{{ $u->created_at }} </td>
                      <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                          <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
