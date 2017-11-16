@extends('master')
@section('content')
<div class="container">
  <div class="container-fluid bg-3" id="bookingHotel">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#bookingHotel" href="#vietnam">Trong nước</a>
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
