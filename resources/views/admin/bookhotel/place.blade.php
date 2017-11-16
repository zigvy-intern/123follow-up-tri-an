<script src="js/bookhotel.js"></script>
<div class="btn-group">
  <div class="form-group mx-sm-6">
    <form method="post" id="select">
      <div class="row">
        <div class="col-xs-3 .col-md-4">
          <div class="province">
            <select name="select-province" id="select-province" class="form-control">
              <option disabled selected value="none">---Chọn tỉnh---</option>
              @foreach($tinhthanhpho as $tinh)
              <option value="{{$tinh->name}}" selected>{{$tinh->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-3 .col-md-4">
          <div class="district">
            <select name="select-district" id="select-district" class="form-control">
              <option disabled selected value="none">Chọn Quận/Huyện</option>
              @foreach($quanhuyen as $quan)
              <option value="{{$quan->name}}" selected>{{$quan->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-3 .col-md-4">
          <div class="ward">
            <select name="select-ward" id="select-ward" class="form-control">
              <option disabled selected value="none">Chọn xã/phường/thị trấn</option>
              @foreach($xaphuongthitran as $xa)
              <option value="{{$xa->name}}" selected>{{$xa->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button type="button"  name="choosearea" id="choosearea" value="searchHotel" class="btn btn-success">Chọn</button>
      </div>
    </form>
  </div>
</div>
