<script src="js/user.js"></script>
<div class="row">
  <div class="createuser">
    <div class="btn-group" onkeyup="onFilter(this)">
      <select name="select-role" id="select-role" class="form-control">
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="User">User</option>
        <option value="All">All</option>
      </select>
    </div>
    <button class="btn btn-primary " data-toggle="modal" data-target="#myUser" ><i class="glyphicon glyphicon-plus"></i></button>
    @include('admin.users.user-modal')
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
          <th>Day of Birth</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Address</th>
          <th>Title</th>
          <th>Role</th>
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($user as $u)
          <tr position="{{$u->role}}" id="tr-user-{{$u->id}}" data-user-id="{{$u->id}}" >
            <td>{{ $u-> id }}</td>
            <td class="user-name">{{ $u->name }}</td>
            <td class="user-birthday">{{ $u->birthday }}</td>
            <td class="user-email">{{ $u->email }} </td>
            <td class="user-phone">{{ $u->phone }} </td>
            <td class="user-address">{{ $u->address}} </td>
            <td class="user-title">{{ $u->title}} </td>
            <td class="user-role">{{ $u->role}} </td>
            <td class="user-password" hidden>{{ $u->password }} </td>
            <td >{{ $u->created_at }} </td>
            <td><button class="btn btn-default" onclick="editUser(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delUser" type="button"><a href="{{route('deleteUser',$u->id)}}" class="glyphicon glyphicon-remove" ></a></button>
            </td>
            @if(Session::has('error'))
              <div class="alert alert-error">{{Session::get('error')}}</div>
            @endif
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
