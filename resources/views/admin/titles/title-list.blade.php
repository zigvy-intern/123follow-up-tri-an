<script src="js/title.js"></script>
<div class="row">
  <div class="Status">
    <div class="btn-group" onkeyup="onFilter(this)">
      <select name="select-sta" id="select-sta" class="form-control">
        <option value="All" selected>All</option>
        <option value="Active" id="active" name="active">Active</option>
        <option value="Inactive" id="inactive" name="inactive">Inactive</option>
      </select>
    </div>
    <button class="btn btn-primary " data-toggle="modal" data-target="#myTitle" ><i class="glyphicon glyphicon-plus"></i></button>
            <!-- Modal -->
    @include('admin.titles.title-modal')
    <form action="" class="navbar-form navbar-right" method="post">
      <div class="form-group input-group">
        <input type="text" id="edit-title-button" onkeyup="onHandleSearch(this)" class="form-control">
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
          <tr position="{{$t->status}}" id="tr-title-{{$t->id}}" data-title-id="{{$t->id}}" >
            <td>{{ $t-> id }}</td>
            <td class='title-name'>{{ $t->title_name }}</td>
            <td class='title-status'>{{ $t->status }} </td>
            <td>{{ $t->created_at }} </td>
            <td><button class="btn btn-default" onclick="editTitle(this)" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button class="btn btn-default" id="delete" type="button"><a class="glyphicon glyphicon-remove" href="{{route('deleteTitle',$t->id)}}"></a></button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
