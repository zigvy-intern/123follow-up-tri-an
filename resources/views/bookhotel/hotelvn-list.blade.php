<div class="container-fluid bg-3 text-center">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        @foreach($bookHotel as $hotel)
        <div class="col-sm-4">
          <img src="source/img/{{$hotel->hotel_image}}" class="img-responsive" style="width:100%" alt="Image">
          <div class="caption" style="text-align: center;">
            <h2 style="margin-bottom: 10px;">{{$hotel->hotel_name}}</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHotelDetail"><i class="glyphicon glyphicon-plus"></i></button>
              @include('bookhotel.hotel-detail-modal')
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
