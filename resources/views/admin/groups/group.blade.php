<script src="js/group.js"></script>
<div id="menu-title">
  <div class="form-title">
    <div class="group-tabs">
      <!--Nav tab-->
      <ul class="nav nav-tabs" role="tablist">
          <ul class="nav nav-tabs" role="tablist">
          <li role="presentation">
              <a class="btn button"><span>Title</span></a>
          </li>
          <li role="presentation" class="active">
              <a class="btn button"><span>Group</span></a>
          </li>
          <li role="presentation">
              <a class="btn button"><span>User</span></a>
          </li>
      </ul>
      </ul>
      <div role="tabpane2" class="tab-pane" id="Group">
        <div class="row-1">
          <div class="Group">
            <div class="btn-group" onkeyup="onFilter(this)">
              <button class="btn btn-primary " data-toggle="modal" data-target="#addgroup"><i class="glyphicon glyphicon-plus"></i></button>
            </div>
            <div id="addgroup" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-group" id="myModalLabel">Add new group</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <form method="post" id="insert_form">
                        <div class="form-group">
                          <label>Group name</label>
                          <input type="text" name="groupname" id="groupname" class="form-control" />
                          <br />
                        </div>
                        <div class="form-group">
                          <label>Leader</label>
                          <input type="text" name="leader" id="leader" class="form-control" />
                          <br />
                        </div>
                        <div class="form-group">
                          <label>Members</label>
                          <input type="text" name="members" id="members" class="form-control" />
                          <br />
                        </div>
                          <div class="form-group">
                          <label>Job</label>
                          <input type="text" name="job" id="job" class="form-control" />
                          <br />
                        </div>
                        <div class="form-group">
                          <label>Create day</label>
                          <input type="text" name="createday" id="createday" class="form-control" />
                          <br />
                        </div>
                        <div class="form-group">
                          <label>Deadline</label>
                          <input type="text" name="deadline" id="deadline" class="form-control" />
                          <br />
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="submitCreateGroup()" name="insert" id="insert" value="Insert" class="btn btn-success"> Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
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
              <script>
                $(document).ready(function(){
                  $("#group-list").on('click','.delete',function(){
                    $(this).closest('td').move();
                  });
                });

              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
