
<div class="form-group mx-sm-6">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addHotel"><i class="glyphicon glyphicon-plus"></i></button>
          @include('admin.bookhotel.addHotel')
      </div>
      <div class="panel-body">
          @foreach($bookhotel as $hotel)
          <div class="col-sm-4">
            <form id="list-hotel">
              <div class="hotel"><h2><a href="{{route('hotelDetail',$hotel->id)}}">{{$hotel->hotel_name}}</a></h2></div>
              <div><img src="source/img/{{$hotel->hotel_image}}" class="img-hotel" style="width:100%" alt="Image">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addDetail"><i class="glyphicon glyphicon-plus"></i></button>
                  @include('admin.bookhotel.detail-hotelvn')
              </div>
            </form>
          </div>
          @endforeach
      </div>
    </div>
  </div>
</div>
