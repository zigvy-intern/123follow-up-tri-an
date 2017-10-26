<script src="js/group.js"></script>
<div class="row-1">
    <div class="Group">
    <div class="btn-group" onkeyup="onFilter(this)">
      <button class="btn btn-primary " data-toggle="modal" data-target="#addgroup"><i class="glyphicon glyphicon-plus"></i></button>
    </div>
    @include('admin.groups.group-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-group input-group">
        <input type="text" onkeyup="onHandleSearch(this)" class="form-control">
        <span class="input-group-btn">
          <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
        </span>
      </div>
    </form>
    <div class="table">
      <table id='group-list' class="table table-bordered" >
        <thead>
          <tr>
            <th>STT</th>
            <th>ID</th>
            <th>Tên Group</th>
            <th>Tên Leader</th>
            <th>Số lượng</th>
            <th>Công việc</th>
            <th>Create_Day</th>
            <th>Deadline</th>
            <th>Sửa</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt = 0 ?>
          @foreach($group as $g)
          <?php $stt = $stt +1 ?>
          <tr>
            <td>{{ $stt }}</td>
            <td>{{ $g-> id }}</td>
            <td>{{ $g-> group_name }}</td>
            <td>{{ $g-> leader_name }}</td>
            <td>{{ $g-> members }}</td>
            <td>{{ $g-> job_name }}</td>
            <td>{{ $g-> create_day }}</td>
            <td>{{ $g-> deadline }}</td>
            <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button></td>
            <td>
              <button class="btn btn-default" id="delGroup" type="button"><a href="{{route('deleteGroup',$g->id)}}" class="glyphicon glyphicon-remove" ></a></button>
              </td>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
