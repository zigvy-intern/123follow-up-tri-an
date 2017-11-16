<!-- <script src="js/bookhotel.js"></script> -->
<div class="btn-group">
  <div class="form-group mx-sm-6">
    <form method="post" id="select">
      <div class="row">
        <div class="col-xs-3 .col-md-4">
          <div class="province">
            <select name="select-province" id="select-province" class="form-control">
              <option disabled selected value="none">Choose City..</option>
              @foreach($city as $c)
              <option value="{{$c->name}}" selected>{{$c->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-3 .col-md-4">
          <div class="district">
            <select name="select-district" id="select-district" class="form-control">
              <option disabled selected value="none">Choose Dictric..</option>
              @foreach($dictrict as $d)
              <option value="{{$d->name}}" selected>{{$d->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-3 .col-md-4">
          <div class="ward">
            <select name="select-ward" id="select-ward" class="form-control">
              <option disabled selected value="none">Choose Ward..</option>
              @foreach($ward as $w)
              <option value="{{$w->name}}" selected>{{$w->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button type="button"  name="choosearea" id="choosearea" value="searchHotel" class="btn btn-primary">Ok</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalHotel"><i class="glyphicon glyphicon-plus"></i></button>
        @include('bookhotel.hotel-modal')
      </div>
    </form>
  </div>
</div>
