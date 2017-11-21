@extends('master')
@section('content')
<div class="hotel-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="bookingHotels">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#bookingHotels" href="#vietnam">Trong nước</a>
        </h4>
      </div>
      <div id="vietnam" class="panel-collapse collapse in">
        <div class="panel-body">
          @include('bookhotel.place')
          @include('bookhotel.hotelvn-list')
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
