@extends('master')
@section('content')
<script src="js/createtitle.js"></script>
<div id="menu-title">
  <div class="form-title">
    <div class="group-tabs">
      <!--Nav tab-->
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
        <div role="tabpanel" class="tab-pane active" id="Title">
          <div class="row">
            <div class="Status">
              <div class="btn-group">
                 <select name="sta" id="sta" class="form-control">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                    <option value="All">All</option>
                 </select>
                </div>
                <button class="btn btn-primary " data-toggle="modal" data-target="#myTitle" ><i class="glyphicon glyphicon-plus"></i></button>
                      <!-- Modal -->
                <div id="myTitle" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myTitleLabel" aria-hidden="true">
                  <div class="modal-dialog" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Add new Title</h4>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <form method="post" id="insert_form">
                            <div class="form-group">
                              <label>Title Name</label>
                              <input type="text" name="title" id="title_name" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label>Status</label>
                              <select name="status" id="status" class="form-control">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                             </select>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" onclick="submitCreateTitle()" name="insert" id="insert" value="Insert" class="btn btn-success"> Add</button>
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
            </div>
            <div class="table">
              <table id='title-list' class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên Title</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($title as $t)
                    <tr>
                      <td>{{ $t-> id }}</td>
                      <td>{{ $t->title_name }}</td>
                      <td>{{ $t->status }} </td>
                      <td>{{ $t->created_at }} </td>
                      <td><button class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button> <button class="btn btn-default" id="delete" type="button"><i class="glyphicon glyphicon-remove"></i></button> </td>
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
