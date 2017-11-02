<div class="row">
  <div class="createRole">
    <div class="btn-group">
      <select name="select-role" id="select-role" class="form-control">
        <option value="All" selected>All</option>
        <option value="Admin" id="admin" name="admin">Admin</option>
        <option value="Manager" id="manager" name="manager">Manager</option>
        <option value="User" id="user" name="user">User</option>
      </select>
    </div>
    <button class="btn btn-primary" data-toggle="modal" data-target="#addrole"><i class="glyphicon glyphicon-plus"></i></button>

    @include('admin.roles.role-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-role input-role">
        <input type="text" onkeyup="#" class="form-control">
        <span class="input-role-btn">
          <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
  </div>
  <div class="table">
    <table id='role-list' class="table table-bordered table-hover" >
      <thead>
        <tr>
          <th>ID</th>
          <th>Role Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($role as $r)
        <tr>
          <td>{{ $r-> id }}</td>
          <td>{{ $r-> name}}</td>
          <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-default" id="delRole" type="button"><a href="#" class="glyphicon glyphicon-remove" ></a></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
