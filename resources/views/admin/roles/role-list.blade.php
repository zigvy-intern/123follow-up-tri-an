<script src="js/role.js"></script>
<div class="row">
  <div class="createRole">
    <button class="btn btn-primary" data-toggle="modal" data-target="#modalRole" style="margin-top:7px;"><i class="glyphicon glyphicon-plus"></i></button>
    @include('admin.roles.role-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-role input-role">
        <input type="text" onkeyup="onRoleSearch(this)" class="form-control">
        <span class="input-role-btn">
          <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
  </div>
  <div class="table" style="font-size: 15px;">
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
        <tr id="tr-role-{{$r->id}}" data-role-id="{{$r->id}}">
          <td>{{$r->id}}</td>
          <td class="role-name">{{$r->role_name}}</td>
          <td><button class="btn btn-default" onclick="editRole(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-default" id="delRole" type="button"><a href="{{route('deleteRole',$r->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
