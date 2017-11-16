@extends('master')
@section('content')
<div class="account-settings-container">
  <div class="panel-group" id="domestic">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#domestic" href="#vietnam">Trong nước</a>
        </h4>
      </div>
      <div id="vietnam" class="panel-collapse collapse in">
        <div class="panel-body">
          @include('admin.bookhotel.place')
          @include('admin.bookhotel.hotelvn-list')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
