<script src="js/group.js"></script>
<div class="row-1">
    <div class="Group">
    <div class="btn-group" onkeyup="onFilter(this)">
      <button class="btn btn-primary " data-toggle="modal" data-target="#modalgroup"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    @include('admin.groups.group-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-group input-group">
        <input type="text" onkeyup="onHandleSearchGroup(this)" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
    <div class="table">
      <table id='group-list' class="table table-bordered" >
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên Group</th>
            <th>Tên Leader</th>
            <th>Thành viên</th>
            <th>Công việc</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($group as $g)
          <tr position="{{$g->groups}}" id="tr-group-{{$g->id}}" data-group-id="{{$g->id}}" >
            <td>{{ $g-> id }}</td>
            <td class="group-name">{{ $g-> group_name }}</td>
            <td class="group-leader">{{ $g-> leader_name }}</td>
            <td class="group-members" >{{ $g-> members }}</td>
            <td class="group-job">{{ $g-> job_name }}</td>
            <td><button class="btn btn-default" onclick="editGroup(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
              <button class="btn btn-default" id="delGroup" type="button"><a href="{{route('deleteGroup',$g->id)}}" class="glyphicon glyphicon-remove" ></a></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
