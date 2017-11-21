@extends('master')
@section('content')
<script language="javascript">
function addTotalPrice()
{
  var tourPrice = document.getElementById("book_tour_price");
  var tourMember = document.getElementById("book_tour_member");
  var total = Number(tourPrice.value) * Number(tourMember.value);
  var totalPrice = document.getElementById('book_tour_totalPrice');
  totalPrice.value = total;
}
</script>
<div class="booking-container" style="min-height: calc(100vh - 76px - 65px);">
  <div class="panel-group" id="bookingTours">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#bookingTours" href="#collapse1">
            Booking Tour
          </a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">
          <form method="POST" enctype="multipart/form-data" action="#">
            {{csrf_field()}}
            <div class="row" style="text-align:left;" id="insert-book-tour-form">
              <div class="form-group">
                <input type="hidden" class="form-control" name="book_tour_id" id="book_tour_id" >
              </div>
              <div class="form-group col-md-6">
                <h3>Your Name</h3>
                <input type="text" class="form-control" name="book_tour_name" id="book_tour_name">
              </div>
              <div class="form-group col-md-6">
                <h3>Choose your Tour</h3>
                <select class="form-control" name="book_choose_tour" id="book_choose_tour">
                  <option>Choose..</option>
                  @foreach($tour as $tou)
                    <option value="{{$tou->id}}">{{$tou->tour_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <h3>Email</h3>
                <input type="email" class="form-control" name="book_tour_email" id="book_tour_email">
              </div>
              <div class="form-group col-md-6">
                <h3>Number Phone</h3>
                <input type="text" class="form-control" name="book_tour_phone" id="book_tour_phone">
              </div>
              <div class="form-group col-md-6">
                <h3>Address</h3>
                <input type="text" class="form-control" name="book_tour_address" id="book_tour_address">
              </div>
              <div class="form-group col-md-6">
                <h3>Day Order</h3>
                <input type="datetime-local" class="form-control" name="book_tour_time" id="book_tour_time">
              </div>
              <div class="form-group col-md-3">
                <h3>Tour Price</h3>
                <input type="text" class="form-control" name="book_tour_price" id="book_tour_price" value="@if(isset($tou->id)) {{$tou->tour_price}} @else '' @endif">
              </div>
              <div class="form-group col-md-3">
                <h3>Number Members</h3>
                <select type="text" name="book_tour_member" id="book_tour_member" class="form-control">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <h3>Total Price</h3>
                <input type="text" class="form-control" name="book_tour_totalPrice" id="book_tour_totalPrice">
              </div>
              <div class="form-group col-md-12" style="text-align:right;">
                <input  type="button" id="bookTour" onclick="addTotalPrice();" class="btn btn-primary" value="Confirm" />
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
