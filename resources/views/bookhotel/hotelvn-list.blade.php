<div class="form-group mx-sm-6">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-body">
        @foreach($bookHotel as $hotel)
        <div class="col-sm-4">
          <img src="source/img/{{$hotel->hotel_image}}" class="img-responsive" style="width:100%" alt="Image">
          <div class="caption" style="text-align: center;">
            <h2 style="margin-bottom: 10px;">{{$hotel->hotel_name}}</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalHotelDetail">Detail</button>
              @include('bookhotel.hotel-detail-modal')
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
