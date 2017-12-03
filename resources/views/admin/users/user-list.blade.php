<script src="js/user.js"></script>
<div class="row">
  <div class="createuser">
    <div class="btn-group" onkeyup="onFilter(this)">
      <select name="select-role" id="select-role" class="form-control">
        <option value="All">All</option>
        @foreach($role as $r)
        <option value="{{$r->id}}">{{$r->role_name}}</option>
        @endforeach
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
  <div class="table" style="font-size: 15px;">
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
        @foreach($joinTable as $jo)
          <tr position="{{$jo->role_id}}" id="tr-user-{{$jo->id}}" data-user-id="{{$jo->id}}" >
            <td>{{ $jo-> id }}</td>
            <td class="user-name">{{ $jo->name }}</td>
            <td class="user-birthday">{{ $jo->birthday }}</td>
            <td class="user-email">{{ $jo->email }} </td>
            <td class="user-phone">{{ $jo->phone }} </td>
            <td class="user-address">{{ $jo->address}} </td>
            <td class="user-title">{{ $jo->title}} </td>
            <td class="user-role">{{ $jo->role_name}} </td>
            <td class="user-password" hidden>{{ $jo->password }} </td>
            <td >{{ $jo->created_at }} </td>
            <td><button class="btn btn-default" onclick="editUser(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delUser" type="button"><a href="{{route('deleteUser',$jo->id)}}" class="glyphicon glyphicon-remove" style="color:#404040;"></a></button>
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
